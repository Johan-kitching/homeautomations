<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use PhpMqtt\Client\ConnectionSettings;
use PhpMqtt\Client\MqttClient;
use PhpMqtt\Client\Repositories\MemoryRepository;

class MqttListener extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:MqttListener';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $server = "156.38.210.147";
        $port = 1883;
        $clientId = 'xxx';
        $username = "web";
        $password = "Morning@12";
        $clean_session = true;
        $mqtt_version = MqttClient::MQTT_3_1_1;

        $connectionSettings = (new ConnectionSettings)
            ->setConnectTimeout(10)
            ->setUsername($username)
            ->setPassword($password)
            ->setUseTls(false)
            ->setKeepAliveInterval(60);

        $mqtt = new MqttClient($server, $port, $clientId, $mqtt_version);

        $mqtt->connect($connectionSettings, $clean_session);
        printf("client connected\n");

        $mqtt->subscribe('#', function ($topic, $message) {
            printf("Received message on topic [%s]: %s\n", $topic, $message);
            // Save the message to the database
        }, 0);

        $mqtt->loop(true);
    }
}
