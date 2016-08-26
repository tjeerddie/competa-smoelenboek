FROM debian:latest
MAINTAINER test@test.com

RUN apt-get update -q
ADD *

EXPOSE -p 8080
