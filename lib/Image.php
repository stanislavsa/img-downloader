<?php
namespace Stanislavsa\ImgDownloader;

/**
 * Class Image
 * @package Stanislavsa\ImgDownloader
 * @author Stanislav
 */
class Image extends File
{
    /**
     * @var array
     */
    protected $urls = array();
    /**
     * @var string
     */
    protected $folder = '';

    /**
     * Image constructor.
     * @param array $urls
     */
    public function __construct($urls = array())
    {
        foreach ($urls as $url) {
            if ($this->checkExtension($url)) {
                $this->urls[] = $url;
            }
        }
    }

    /**
     * Retrieve a list with urls
     *
     * @return array
     */
    public function getUrls()
    {
        return $this->urls;
    }

    /**
     * Save image in a local folder
     *
     * @param string $url
     * @param string $content Image file content
     * @return void
     * @throws \Exception
     */
    public function save($url, $content)
    {
        if (empty($this->folder)) {
            throw new \Exception('Images folder is not specified! Use "setFolder" function');
        }

        $filename = basename($url);

        if ( file_put_contents($this->folder . '/' . $filename, $content) ) {
            echo 'Image downloaded: ' . $filename . '<br>';
        } else {
            throw new \Exception('File did not saved!');
        }

    }

    /**
     * Set local folder to store images
     *
     * @param string $folder
     * @return void
     * @throws \Exception
     */
    public function setFolder($folder = '')
    {
        if (!empty($folder)) {
            $this->folder = $folder;

            if (!file_exists($this->folder)) {
                mkdir($this->folder, 0755);
            }
        } else {
            throw new \Exception('Folder path should not be empty!');
        }
    }

    /**
     * @param string $url
     * @return bool
     * @throws \Exception
     */
    public function checkExtension($url)
    {
        $acceptable_exts = array(
            'jpg' => 1,
            'png' => 1,
            'gif' => 1,
        );

        if (empty($url)) {
            throw new \Exception('Empty image url!');
        }

        $ext = substr($url, -3);

        if (isset($acceptable_exts[$ext])) {
            return true;
        } else {
            throw new \Exception('Wrong file extension: ' . $url);
        }
    }

}
