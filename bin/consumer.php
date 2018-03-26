<?php

$conf = new RdKafka\Conf();

$conf->set('group.id', 'phpconsumer');
$conf->set('metadata.broker.list', '10.23.241.11:9091');

$topicConf = new RdKafka\TopicConf();
$topicConf->set('auto.offset.reset', 'smallest');

$conf->setDefaultTopicConf($topicConf);

$consumer = new RdKafka\KafkaConsumer($conf);

$consumer->subscribe(['mobile-api-common-im']);

echo "";

while (true) {
    $message = $consumer->consume(120*1000);
    switch ($message->err) {
        case RD_KAFKA_RESP_ERR_NO_ERROR:
            var_dump($message);
            break;
        case RD_KAFKA_RESP_ERR__PARTITION_EOF:
            echo "No more messages; will wait for more\n";
            break;
        case RD_KAFKA_RESP_ERR__TIMED_OUT:
            echo "Timed out\n";
            break;
        default:
            throw new \Exception($message->errstr(), $message->err);
            break;
    }
}

?>