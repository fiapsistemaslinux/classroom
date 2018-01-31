# Escaneamento de Redes

Os procesos de escaneamentos baseados em Analise de VUlnerabilidades utilizam ferramentas especificas de acordo com o sistema a ser verificado, O nessus e o W3af são exemplos destes tipos de ferramentas, porém no Ciclo de Vida de uma VA, existe um passo a ser executado antes da analíse, o levantamento de informaões do alvo, é nesse ponto que entramos com o nmap:

## Utilizando o NMAP

[[images/nmap-eye.jpg]]

Nmap é um software livre que realiza port scan desenvolvido pelo Gordon Lyon, auto-proclamado hacker "Fyodor". É muito utilizado para avaliar a segurança dos computadores, e para descobrir serviços ou servidores em uma rede de computadores.

O Nmap é conhecido pela sua rapidez e pelas opções que dispõe. O Nmap é um programa CUI (Console User Interface), que corre na linha de comandos. No entanto, este tem uma interface gráfica (GUI), o NmapFE (Nmap Front End), que foi substituido pelo Zenmap em 11 de Outubro de 2007, por ser uma versão portátil e prover uma interface melhor para execução e especialmente para visualização e análise dos resultados do Nmap.

O nmap é um recurso default no Sistema Operacional Kali Linux mas quando necessário pode ser obtido diretamente no [Site do Projeto](https://nmap.org/download.html) inclusive em sua versão para Windows;

Para começar, tente executar uma consulta a um site especifico:

```sh
nmap -O www.exemplo.com.br
```

Se analizarmos com calma, além do nmap retornar as portas que estão abertas no destino, caso dispinível ele mostra também o sistema operacional relacionado;

Como já mencionado, com o NMAP podemos extrair banners de outros serviços que estão rodando na máquina, basta o simples comando nmap "–sV", ou seja, s de scan e "V" de versão.

Para esta consulta considere um avlo interno, como a VM de testes do Projeto [OWASP Broken Web Applications](https://www.owasp.org/index.php/OWASP_Broken_Web_Applications_Project) disponível para download [No  Sourceforge](https://sourceforge.net/projects/owaspbwa/),

Repare na nossa próxima consulta, em que são exibidas as versões relativas aos serviços:

```sh
nmap -sV 192.168.X.X 
```

---

## A ( Impressão Digital ) de um servidor WEB:

Uma das fases de um ataque a um servidor WEB é levantar informações sobre o seu alvo, um dos meios de se conseguir essa informação é através do fingerprint do servidor, trata-se do conjunto de informaçẽos que identifica o servidor utilizado para hospedagem, essa informações são acessíveis a partir de requisições HTTP o comando nmap pode ser utilizado para esta tarefa conforme o exemplo abaixo:

```sh
nmap -sV exemplo.com.br
```
> A execução acima é um escaneamento simples de portas utilizando os parâmetros -sV "Probe open ports to determine service/version info" ou seja trata-se da exploração de uma função do nmap responsável exatamente por determinar a versão de uma determinada aplicação, em sua configuração padrão a maioria das implementações de apache ou nginx  entregam essa informação a partir deste simples escaneamento.

A mesma informação aparece se tentarmos algo mais simples como um curl:

```sh
curl --verbose  exemplo.com.br
```

### Usando o httprint

Trata-se de uma ferramenta cuja função é capturar o fingerprint e informações similares como por exemplo o banner de identificação de um servidor WEB, essa ferramenta não é um recurso default da distribuição Kali Linux, portanto deve ser baixado do [SITE](http://www.net-square.com/httprint.html) do projeto;

Faça o downlod da ferramenta:

```sh
wget -P /opt http://www.net-square.com/_assets/httprint_linux_301.zip
cd /opt
unzip /opt/httprint_*
cd httprint_*/linux
```

Feito o download execute um teste usando o httprint:

```sh
./httprint -h 87.230.29.167 -s signatures.txt

...
httprint v0.301 (beta) - web server fingerprinting tool
(c) 2003-2005 net-square solutions pvt. ltd. - see readme.txt
http://net-square.com/httprint/
httprint@net-square.com

Finger Printing on http://87.230.29.167:80/
Finger Printing Completed on http://87.230.29.167:80/
--------------------------------------------------
Host: 87.230.29.167
Derived Signature:
Microsoft-IIS/6.0
FACD41D36ED3C295811C9DC5811C9DC5050C5D2594DF1BD04276E4BB811C9DC5
0D7645B5811C9DC52A200B4CCD37187C11DDC7D78398721E811C9DC52655F350
FCCC535BE2CE6923E2CE6923811C9DC5E2CE69272576B769E2CE6926FACD41D3
6ED3C295E1CE67B1811C9DC5E2CE6923E2CE69236ED3C2956ED3C295E2CE6923
E2CE6923FCCC535FA732F670E2CE6927E2CE6920
...

```
	
Ao apontar para qualquer destino o retorno exibido pelo comando apontará a porcentagem de chances de que o servidor alvo esteja utilizando determinada tecnologia;

### Uso do netcraft

Uma solução online para levantamento de informações sobre servidores WEB é o uso do [Netcraft](http://www.netcraft.com);

Trata-se de um recurso online para análise de headers e escaneamento de portas determinando o fingerprint do site:

Utilize a opção abaixo para o processo de escaneamento:
[[images/netcraft-00.png]]

O resultado deverá ser algo no layout do retorno abaixo a depender do site sendo analisado:
[[images/netcraft-01.png]]

Outras ferramentas do mesmo genero:

[httprecon](http://www.computec.ch/projekte/httprecon)
[Shodan](http://www.shodanhq.com)


## FAQ - Determinando o fingerrpint de seu alvo:

***Porque levantar este tipo de informação?***

Levantar o fingerprint de um servidor é uma tarefa crítica para o pentester e não é dificil entender o porque, ***conhecer a versão e o tipo de um servidor web em execução permite que o pentester determine  as vulnerabilidades conhecidas e as explorações apropriadas a serem usadas durante os testes.***

***Porque o fingerprint é importante?***

Existem vários fornecedores diferentes e versões de servidores web no mercado hoje. Conhecer o tipo de servidor web que está sendo testado ajuda significativamente no processo de teste e também pode mudar o curso do teste. Essas informações podem ser obtidas enviando comandos específicos do servidor web e analisando a saída, já que cada versão do software do servidor da Web pode responder de forma diferente a esses comandos.

***Como funciona?***

Ao saber como cada tipo de servidor web responde a comandos específicos, uma ferramenta como namp ou httprint pode enviar comandos para o servidor web, analisar a resposta e compará-la com um banco de dados de assinaturas conhecidas. Observe que geralmente é necessário vários comandos diferentes para identificar com precisão o servidor da Web, já que versões diferentes podem reagir de forma semelhante ao mesmo comando. Raramente versões diferentes reagem a requisiçẽos HTTP da mesma forma, Assim, enviando vários comandos diferentes, o petester pode aumentar a precisão de sua suposição.

> ***Customizações de Segurança em Webservers:*** Além da implementação de criptografia dentro de um servidor WEB é possível aplicar algumas customizações de segurança referentes a informações exibidas ao receber requisições, atualização de pacotes, diretórios ocultos etc, algumas dessas opções são customizáveis, principalmente no uso do apache, vale a pena conhecer algumas delas e alguns comportamentos referentes a este tipo de servidor, tais recursos são utilizados tanto por atacentes quanto em processos de Hardening e pentest de aplicações.

---

## Material de Referência:

A página do Projeto NMAP possui uma vasta documentação com Guias de Uso e exemplos de métodos de escaneamento, o material possui inclusive versões em Português:

* [Guia de Referência do Nmap](https://nmap.org/man/pt_BR/index.html)

Boa parte da explicação acima, principalemnte a FAQ foi extraida da linda página da OWASP: 

* [Fingerprint Web Server OTG-INFO-002](https://www.owasp.org/index.php/Fingerprint_Web_Server_(OTG-INFO-002))
* [An Introduction to HTTP fingerprinting](http://www.net-square.com/httprint_paper.html)

----

**Free Software, Hell Yeah!**
