# Simple Intercom Canvas Kit app built in PHP

This example was tested using PHP 7.4

See the complete API reference in the [documentation](https://developers.intercom.com/canvas-kit-reference/reference/introduction).

## Set up

Just boot the application:

```
composer install
symfony server:start --port:8001
```

To point Intercom traffic to this environment, you can use ngrok:

```
ngrok http 8001
```

Create an app in Intercom's [Developer Hub](https://app.intercom.com/a/apps/_/developer-hub), with a Canvas Kit app pointing to this environment:

* For users, leads and visitors:
  * Initialize flow webhook URL: `https://<my-ngrok-id>.ngrok.io/messenger_app/initialize`
  * Submit flow webhook URL: `https://<my-ngrok-id>.ngrok.io/messenger_app/submit`

Implementation for teammates would be very similar.
