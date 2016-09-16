<?php
namespace Stanislavsa\ImgDownloader;

/**
 * Class File
 * @package Stanislavsa\ImgDownloader
 * @author Stanislav
 */
abstract class File
{
    /**
     * @return array
     */
    abstract public function getUrls();

    /**
     * Save file in a local folder
     *
     * @param string $url
     * @param string $content
     * @return mixed
     */
    abstract public function save($url, $content);

    /**
     * Set local folder to store files
     *
     * @param string $folder
     * @return mixed
     */
    abstract public function setFolder($folder);

    /**
     * @param string $url
     * @return bool
     */
    abstract public function checkExtension($url);
}
