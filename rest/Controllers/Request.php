<?php

class MaximaRequest extends modRestController
{
    public $type = 'string';

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

    private function getData($query)
    {
        //add db
        $query = $this->prepareQuery($query);
        $result['message'] = $this->exec($query);
        if ($this->type == 'image') {
            $result['image'] = "assets/{$this->modx->user->id}/{$this->time}.png";
        }
        return $result;
    }

    private function prepareQuery($query)
    {
        $query = trim($query);
        if ($query[strlen($query) - 1] != ';') {
            $query .= ';';
        }

        if (strpos($query, 'plot') !== false || strpos($query, 'julia') !== false || strpos($query, 'mandelbrot') !== false) {
            $this->type = 'image';
            if (!file_exists(MODX_BASE_PATH."assets/{$this->modx->user->id}/")) {
                mkdir(MODX_BASE_PATH."assets/{$this->modx->user->id}/");
            }

            $query = preg_replace("/]\)\;/", "],[png_file,\\\"" . MODX_BASE_PATH . "assets/{$this->modx->user->id}/" . "{$this->time}.png\\\"])$", $query);
        }

        return $query;
    }

    private function exec($query)
    {
        $descriptorspec = array(
            0 => array("pipe", "r"),  // stdin - канал, из которого дочерний процесс будет читать
            1 => array("pipe", "w"),  // stdout - канал, в который дочерний процесс будет записывать
            2 => array("file", "/tmp/error-output.txt", "a") // stderr - файл для записи
        );

        $cwd = '/tmp';
        $env = [];
        $process = proc_open('maxima -q --batch-string="' .  $query . '"', $descriptorspec, $pipes, $cwd, $env);


        if (is_resource($process)) {
            fclose($pipes[0]);
            $result = stream_get_contents($pipes[1]);
            fclose($pipes[1]);
            proc_close($process);

        }

        return $result;
    }
}