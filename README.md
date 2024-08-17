## Create the shell script:
Save this script to a file, for example /usr/local/bin/git_pull_webhook.sh, and make it executable

## Set up the Webhook Endpoint:
Create a new file, for example /var/www/html/git_pull_webhook.php

## Configure the Webhook on Your Git Hosting Service:
1. Go to your repository on GitHub.
2. Click on "Settings".
3. Click on "Webhooks" in the left menu.
4. Click "Add webhook".
5. Set the "Payload URL" to http://your-server-ip/git_pull_webhook.php.
6. Set the "Content type" to application/json.
7. Set the "Secret" to the secret value you used in your PHP script.
8. Choose "Let me select individual events" and select "Pushes" (or whatever events you desire).
9. Click "Add webhook".
