FROM helcorin/pmidevops:base
MAINTAINER Helder Pereira <profhelder.pereira@fiap.com.br>
WORKDIR /var/cache/showoff

ADD . .

CMD ["sh", "-c", "showoff serve --port=$PORT"]
