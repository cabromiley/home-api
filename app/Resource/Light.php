<?php


namespace App\Resource;


class Light
{
    protected $id;
    protected array $data = [];

    /**
     * Light constructor.
     * @param array $data
     */
    public function __construct($id, array $data)
    {
        $this->id = $id;
        $this->data = $data;
    }

    public function update(array $state)
    {
        $this->data = app(Hue::class)->updateLightState($this->id, $state);
    }

    public function toArray()
    {
        return $this->data;
    }
}
