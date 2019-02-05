#!/bin/bash
python serveurBroadcast.py & 
php bin/console server:start *:8000
