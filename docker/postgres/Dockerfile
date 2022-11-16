FROM postgres:13

RUN localedef -i pl_PL -c -f UTF-8 -A /usr/share/locale/locale.alias pl_PL.UTF-8
ENV LANG PL_PL.utf8
ENV LC_ALL="pl_PL.UTF-8"
ENV LC_CTYPE="pl_PL.UTF-8"
ENV LC_COLLATE="pl_PL.UTF-8"
ENV LANGUAGE="pl_PL.UTF-8"
ENV TZ=Europe/Warsaw

RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone
