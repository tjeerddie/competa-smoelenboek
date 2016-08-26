FROM debian:latest
MAINTAINER test@test.com

RUN apt-get update -q
ADD /app
ADD /build
ADD /resources
ADD ./.gitignore
ADD ./jshintrc
ADD ./README.md
ADD ./gruntfile.js
ADD ./package.json

EXPOSE -p 8080
