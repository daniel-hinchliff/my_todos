# my_todos
A todo list manager.

This application requires docker to run. You can get docker [here](https://get.docker.com/).

To start the application for development or previewing run:

```bash
sh start.sh
```

After starting the application for the first time you will need to run the install script:

```bash
sh install.sh
```

After install is complete the website will be published on port 8080 and a VNC server will be published on port 5900. You can find a VNC viewer [here](https://www.realvnc.com/en/connect/download/viewer/). The VNC password is 'secret'.

If you are connected to VNC and have your popcorn ready, run the following command to watch the tests run:

```bash
sh run_tests.sh
```

To stop the application run:

```bash
sh stop.sh
```
