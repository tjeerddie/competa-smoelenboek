FROM debian:latest
MAINTAINER test@test.com

RUN apt-get update -q
ADD * test

EXPOSE -p 8080
