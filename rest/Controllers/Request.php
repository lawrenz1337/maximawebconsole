<?php

class MaximaRequest extends modRestController
{
    public $type = 'string';
    public $images = [];
    /** @var $maxima maximaweb */
    private $maxima = null;
    private $recordId = null;

    public function initialize()
    {
        $this->maxima = $this->modx->getService(
            'maximaweb',
            'maximaweb',
            $this->modx->getOption('maximaweb.core_path', null, $this->modx->getOption('core_path') . 'components/maximaweb/') . 'model/'
        );
    }

    public function verifyAuthentication()
    {
        return (bool)$this->modx->user->id;
    }

    public function post()
    {
        try {
            $output = $this->getData($this->getProperty('query'));
            $this->success('', $output);
        } catch (Exception $exception) {
            $this->failure($exception->getMessage());
        }
    }

    public function get()
    {
        $output = [];
        $c = $this->modx->newQuery('maximaweb_request');
        $c->where(array('user_id' => $this->modx->user->id, 'done' => 1));
        $c->select('input,output,files');
        $c->sortby('id', 'DESC');
        $c->limit($this->getProperty('limit'), $this->getProperty('start'));
        if ($c->prepare() && $c->stmt->execute()) {
            $results = $c->stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($results as &$row) {
                $row['files'] = $this->modx->fromJSON($row['files']) ?: [];
            }
            $output = $results;
        }
        $this->success('', $output);
    }

    /**
     * @param $queries
     * @return mixed
     * @throws Exception if database failed
     */
    private function getData($queries)
    {
        /** @var maximaweb_request $object */
        $object = $this->modx->newObject('maximaweb_request');
        $object->set('user_id', $this->modx->user->id);
        $object->set('input', $queries);
        $object->set('output', '');
        if ($object->save()) {
            $this->recordId = $object->get('id');
            $queries = $this->prepareQuery(explode(PHP_EOL, $queries));
            $result['response'] = $this->maxima->exec($queries);
            $object->set('output', $result['response']);
            $object->set('done', 1);
            if ($this->type == 'image') {
                $result['images'] = $this->images;
                $object->set('files', $this->modx->toJSON($this->images));
            }
            $object->save();
            return $result;
        } else {
            throw new Exception('Error occured while writing to DB');
        }
    }

    private function prepareQuery($queries)
    {
        $i = 0;
        foreach ($queries as $key => &$query) {
            $query = trim($query);
            if ($query[strlen($query) - 1] != ';' && $query[strlen($query) - 1] != '$') {
                $query .= ';';
            }

            if (strpos($query, 'plot') !== false || strpos($query, 'julia') !== false || strpos($query, 'mandelbrot') !== false) {
                $this->type = 'image';
                $query[strlen($query) - 1] = '$';
                if (!file_exists(MODX_BASE_PATH . "assets/{$this->modx->user->id}/")) {
                    mkdir(MODX_BASE_PATH . "assets/{$this->modx->user->id}/");
                }
                $query = substr_replace($query, ',[png_file,"' . MODX_BASE_PATH . "assets/{$this->modx->user->id}/" . "{$this->recordId}_{$i}.png\"]", strlen($query) - 2, 0);
                $this->images[] = "assets/{$this->modx->user->id}/" . "{$this->recordId}_{$i}.png";
                $i++;
            }
        }
        return $queries;
    }
}