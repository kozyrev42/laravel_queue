<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

- laravel version: 8.83
- базу данных использую "step3"

1. Инициализация проекта.

2. Сделал роут и метод для регистрации юзера.

3. Сделал функционла синхронной отправки 2-х email сообщений

Прописать в .env
   MAIL_MAILER=smtp
   MAIL_HOST=smtp.mail.ru
   MAIL_PORT=465
   MAIL_USERNAME=kozyrevsasha@mail.ru
   MAIL_PASSWORD=на-mail.ru-нужно-сгенерировать-пароль-для-внешних-приложений
   MAIL_ENCRYPTION=ssl
   MAIL_FROM_ADDRESS=kozyrevsasha@mail.ru
   MAIL_FROM_NAME="${APP_NAME}"
