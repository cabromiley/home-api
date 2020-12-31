<?php


namespace App\Resource;


use Illuminate\Support\Facades\Http;

class Hue
{
    protected string $baseURL = '';

    protected string $userToken = '';

    /**
     * Hue constructor.
     * @param string $baseURL
     * @param string $userToken
     */
    public function __construct(string $baseURL, string $userToken)
    {
        $this->baseURL = $baseURL;
        $this->userToken = $userToken;
    }

    public function getLights()
    {
        return Http::get($this->makeBase() . '/lights')->json();
    }

    public function getLight($id)
    {
        return Http::get($this->makeBase() . 'lights/' . $id)->json();
    }

    private function makeBase()
    {
        return sprintf('%s/api/%s', $this->baseURL, $this->userToken);
    }
}
