<?php

class maximaweb
{
    /** @var modX $modx */
    public $modx;


    /**
     * @param modX $modx
     * @param array $config
     */
    function __construct(modX &$modx, array $config = [])
    {
        $this->modx =& $modx;
        $corePath = MODX_CORE_PATH . 'components/maximaweb/';
        $assetsUrl = MODX_ASSETS_URL . 'components/maximaweb/';

        $this->config = array_merge([
            'corePath' => $corePath,
            'modelPath' => $corePath . 'model/',
            'processorsPath' => $corePath . 'processors/',

            'connectorUrl' => $assetsUrl . 'connector.php',
            'assetsUrl' => $assetsUrl,
            'cssUrl' => $assetsUrl . 'css/',
            'jsUrl' => $assetsUrl . 'js/',
        ], $config);

        $this->modx->addPackage('maximaweb', $this->config['modelPath']);
        $this->modx->lexicon->load('maximaweb:default');
    }

    public function exec($queries)
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