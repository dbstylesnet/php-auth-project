#!/bin/bash
# Database initialization script
# This script runs SQL files to initialize the database schema

mysql -u"${MYSQL_USER:-app}" -p"${MYSQL_PASSWORD:-app}" "${MYSQL_DATABASE:-app}" < /docker-entrypoint-initdb.d/01-init.sql

