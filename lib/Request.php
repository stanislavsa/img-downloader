<?php
namespace Stanislavsa\ImgDownloader;

/**
 * Class Request
 * @package Stanislavsa\ImgDownloader
 * @author Stanislav
 */
class Request
{
    /**
     * @var File
     */
    protected $obj;

    /**
     * Request constructor.
     * @param File $obj
     */
    public function __construct(File $obj)
    {
        $this->obj = $obj;
    }

    /**
     * @return void
     * @throws \Exception
     */
    public function send()
    {
        if (!ini_get('allow_url_fopen')) {
            throw new \Exception('allow_url_fopen should be activated!');
        }

        $file_urls = $this->obj->getUrls();

        if (!empty($file_urls)) {

            if (!is_array($file_urls)) {
                throw new \Exception('Files urls array is not valid!');
            }

            foreach ($file_urls as $url) {
                $content = file_get_contents($url);

                if ($content === false) {
                    throw new \Exception('File could not be downloaded!');
                }

                $this->obj->save($url, $content);
            }
        }
    }
}
