# Run the website 
## Install Docker Desktop:
### Windows 10/11 and macOS
If you haven't installed Docker Desktop, you can download it from the [Docker website](https://docs.docker.com/desktop/install/windows-install/).


### Start Docker Desktop app
First you will need to open the Docker Desktop app 

![image](https://github.com/inf2021013/data_analysis_dev_app/assets/166173503/58b906f0-57ae-4089-aea8-e46da4316a52)

and ensure it runs. 

![image](https://github.com/inf2021013/data_analysis_dev_app/assets/166173503/a2dc4740-1700-45e6-9f6b-3f70435d9c81)


## Verify Docker Daemon it runs
You can verify it runs by typing in your terminal:
```
docker info
```
if its not running you will get an error.


## run docker-compose
cd to docker-compose directory
run:
```
docker-compose up
```
## if you change a mysql
to see all images
```
docker ps -a
```

### stop docker container

docker stop CONTAINER ID
example:
```
docker stop 63dfa03f5446 
```

### remove docker
example:
```
docker rm 63dfa03f5446
```


delete docker compose from the docker app

rerun 
```
docker-compose up
```
