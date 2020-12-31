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

    public function findLight($id)
    {
        return new Light($id, Http::get($this->makeBase() . 'lights/' . $id)->json());
    }

    public function updateLightState($id, array $state)
    {
        \Log::info('Called: ' . $this->makeBase() . '/lights/' . $id . '/state/');
        return Http::put($this->makeBase() . '/lights/' . $id . '/state/', $state )->json();
    }

    private function makeBase()
    {
        return sprintf('%s/api/%s', $this->baseURL, $this->userToken);
    }
}
