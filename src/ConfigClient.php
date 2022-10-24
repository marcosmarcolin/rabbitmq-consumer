<?php

namespace MarcosMarcolin\RabbitMQ\Consumer;

class ConfigClient
{
    /* Basic Config */
    private $host = '127.0.0.1';
    private $user = 'guest';
    private $pass = 'guest';
    private $port = 5672;
    private $heartbeat = 60.0;

    /**
     * @return string
     */
    public function getHost(): string
    {
        return $this->host;
    }

    /**
     * @param string $host
     * @return ConfigClient
     */
    public function setHost(string $host): ConfigClient
    {
        $this->host = $host;
        return $this;
    }

    /**
     * @return string
     */
    public function getUser(): string
    {
        return $this->user;
    }

    /**
     * @param string $user
     * @return ConfigClient
     */
    public function setUser(string $user): ConfigClient
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return string
     */
    public function getPass(): string
    {
        return $this->pass;
    }

    /**
     * @param string $pass
     * @return ConfigClient
     */
    public function setPass(string $pass): ConfigClient
    {
        $this->pass = $pass;
        return $this;
    }

    /**
     * @return int
     */
    public function getPort(): int
    {
        return $this->port;
    }

    /**
     * @param int $port
     * @return ConfigClient
     */
    public function setPort(int $port): ConfigClient
    {
        $this->port = $port;
        return $this;
    }

    /**
     * @return float
     */
    public function getHeartbeat(): float
    {
        return $this->heartbeat;
    }

    /**
     * @param float $heartbeat
     * @return ConfigClient
     */
    public function setHeartbeat(float $heartbeat): ConfigClient
    {
        $this->heartbeat = $heartbeat;
        return $this;
    }

    public function toArray(): array
    {
        return get_object_vars($this);
    }
}