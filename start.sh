#!/bin/sh
echo "Container started"

# Run cron every minute
while true
do
  php cron.php
  sleep 60
done
