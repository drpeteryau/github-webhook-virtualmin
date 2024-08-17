#!/bin/bash

# Set permission
# sudo chmod +x /usr/local/bin/git_pull_webhook.sh

# Set the path to your project directory
PROJECT_DIR="/path/to/your/project"

# Log file for debugging
LOG_FILE="/var/log/git_pull_webhook.log"

# Go to project directory
cd $PROJECT_DIR || { echo "Failed to cd to project directory" >> $LOG_FILE; exit 1; }

# Pull the latest changes from the repository
/usr/bin/git pull origin main >> $LOG_FILE 2>&1

# Log the date and time of the pull
echo "Git pull executed at $(date)" >> $LOG_FILE
