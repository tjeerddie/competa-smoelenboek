FROM debian:latest
MAINTAINER test@test.com

RUN apt-get update -q
RUN mkdir test
ADD * test/

EXPOSE -p 8080
