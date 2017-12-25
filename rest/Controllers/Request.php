<?php

class MaximaRequest extends modRestController
{
    public $type = 'string';
    public $images = [];

    public $time = 0;

    public function initialize()
    {
        $this->time = time();
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

    private function getData($queries)
    {
        //add db
        $queries = $this->prepareQuery(explode(PHP_EOL, $queries));
        $result['message'] = $this->exec($queries);
        if ($this->type == 'image') {
            $result['images'] = $this->images;
        }
        return $result;
    }

    private function prepareQuery($queries)
    {
        foreach ($queries as &$query) {
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
                $query = substr_replace($query, ',[png_file,"' . MODX_BASE_PATH . "assets/{$this->modx->user->id}/" . "{$this->time}.png\"]", strlen($query) - 2, 0);
                $this->images[] = "assets/{$this->modx->user->id}/" . "{$this->time}.png";
            }
        }
        return $queries;
    }

    private function exec($queries)
    {
        $descriptorspec = array(
            0 => array("pipe", "r"),  // stdin - канал, из которого дочерний процесс будет читать
            1 => array("pipe", "w"),  // stdout - канал, в который дочерний процесс будет записывать
            2 => array("file", "/tmp/error-output.txt", "a") // stderr - файл для записи
        );

        $cwd = '/tmp';
        $env = [];
        $process = proc_open('maxima --very-quiet', $descriptorspec, $pipes, $cwd, $env);

        $result = '';
        if (is_resource($process)) {
            foreach ($queries as $query) {
                fwrite($pipes[0], $query);
            }
            fwrite($pipes[0], "quit();");
            fclose($pipes[0]);
            $result = stream_get_contents($pipes[1]);
            fclose($pipes[1]);
            proc_close($process);

        }

        return $result;
    }
}