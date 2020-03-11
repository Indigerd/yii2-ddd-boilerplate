<?php

Yii::setAlias('@base', realpath(__DIR__ . '/../../'));
Yii::setAlias('@console', realpath(__DIR__ . '/../../Console'));
Yii::setAlias('@api', realpath(__DIR__ . '/../../Api'));
Yii::setAlias('@frontend', realpath(__DIR__ . '/../../Frontend'));

// Url Aliases
Yii::setAlias('@apiUrl', getenv('API_URL'));
Yii::setAlias('@apiTestUrl', getenv('API_TEST_URL'));
Yii::setAlias('@serviceAuthUrl', getenv('AUTH_API_URL'));
