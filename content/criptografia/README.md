# Conexões HTTPS e tráfego Seguro de Dados

Avançando um pouco a partir dos princípios básicos de uma conexao HTTP temos a parte da critografia no tráfego de dados, isto é, a implementação e exploração do protocolo HTTPS e sua importância para internet atual.

## HTTPS

Do protocolo HTTP que significa "Hypertext Transfer Protocol" temos o HTTPS que hoje seria algo como "Hypertext Transfer Protocol over TLS", na prática trata-se exatamente da implementação do protocolo HTTP encapsulado em uma conexão criptografada usando o protocolo TLS, sua especificação encontra-se na [RFC2818](https://tools.ietf.org/rfc/rfc2818.txt), que aliás é surpreendentemente curta e descreve como deveria ser o processo de trasferência de dados de forma criptografada.

### O protocolo TLS

A primeira coisa a se saber sobre o protocolo TLS é que trata-se de uma evolução do antigo SSLv3, não atoa sites que implementam criptografia usando apenas SSL são considerados "inseguros", toda documentação atualizada referente a HTTPS recomenda o uso do TLS ao invés do SSL. O conceito básico do TLS é que a criptografia é implementada sem que o protocolo base a ser encapsulado seja modificado, isso ocrre no HTTPS.

A imagem abaixo é referenciada no Livro [Desconstruindo a web](http://desconstruindoaweb.com.br/), utilizado como base para boa parte desta aula;

[[images/TLS-00.png]]

No livro o autor Willian Molinari descreve de forma sucinta as duas camadas do TLS:

 - ***TLS Record Protocol:*** Camada responsável pelo encapsulamento dos protocolos usados "dentro" da conexão TLS;
 - ***TLS Handshake Protocol:*** Camada responsável pelo processo de negociação/autenticação da conexão criptografada, aqui entram os principais assuntos deste estudo, As chaves/certificados de Criptografia e os Algoritmos e cifras usados na encriptação;

Considere a imagem abaixo para analisarmos uma conexão criptografada:

[[images/negotiate_tls.gif]]

Analisando cada um dos passos descritos na imagem e resumindo bastante os processos que os envolvem temos o seguinte:

1. O cliente inicia a conexão com um ***client_hello*** onde alguns padrões serão estabelecidos: Versão do Protocolo, Conjunto de Ciphers, etc.

2. O servidor recebe a solicitação com o ***client_hello*** e responde com um ***server_hello*** confirmando informações e padrões recebidos;

3. Neste ponto vale uma atenção especial as ciphers, o cliente enviou ao servidor uma lista de ciphers e o servidor deverá responder definindo qual cipher será utilizada na criptografia da conexão, a correta escolha do conjunto de ciphers é feita pelo servidor que é quem aceita ou não a conexão e terá influência direta na segurança do tráfego de dados;

4. Ainda na fase da reposta do servidor ao cliente temos o item ***certificate***, neste ponto será enviado o certificado de criptografia, sua confiabilidade será avaliada pelo cliente ( item ***certificate*** da imagem acima ), esse passo é executado por exemplo pelo navegador usado para acesso ao conteúdo, como na figura do exemplo abaixo, na aceitação do certificado é verificada sua precedencia ( Qual a CA envolvida ), até quando vale o certificado e algumas outras informações se disponíveis como por exemplo a CN, O, OU e o Serial Number, algumas dessas informações dependem do modelo de certificado utilizado.

5.  No item ***change_cipher_spec*** é feita a confirmação da cifra a ser utilizada, este assunto de negociação e definição de cifras ou "ciphers" é tão importante que recebeu sua própria sessão nesta aula e será estudado mais a frente, além disso nesse momento o Handshake é finalizado e estabelecido a conexão criptografada para o tráfego de dados;

[[images/certificate.png]]

---

### FAQ - Questões sobre o funcionamento de um certificado:

***1. O que é um certificado Digital?***

Um certificado digital é um arquivo que contém um conjunto de informações referentes a uma entidade, isto é a empresa, pessoa ou recurso para qual o certificado foi emitido.

***2. Como os certificados funcionam?***

Um certificado digital funciona de forma semelhante a um documento de identificação como um passaporte ou carteira de motorista, geralmente um certificado contêm uma chave pública e a identidade da entidade proprietária. Eles são emitidos por autoridades de certificação (CAs), que devem validar a identidade do titular do certificado, tanto antes da emissão do certificado quanto quando um certificado é usado.

***3. Sobre as autoridades de certificação:***

A Autoridade de Certificação (CA) é a organização ou sistema responsável por emitir certificados digitais, mas além disso também é a organização responsável por garantir sua validade, ou seja, é a autoridade certificadora quem valida se a chave pública apresentada na comunicação usando o protocolo SSL ( Essa chave é "apresentada" através do certificado digital emitido pela CA ) pertence à pessoa, organização ou entidade cujas informações estão contidas no certificado.

***4. Como criar um certificado?***

Um certificado pode ser criado utilizando o comando openssl conforme veremos a seguir, depois de criar o certificado, você poderá enviá-lo a uma unidade certificadora, por exemplo a Serasa Experian, VeriSign, CertSign, ACBR, Serpro, entre outras, essa unidade fará o processo de assinatura do certificado, sendo geralmente cobrado um valor  anual ou bienal pelo serviço, essa autoridade passa a ser a responsavel por validar o certificado conforme descrito no item 3.

***5. Ceritifcados auto assinados:***

Você também pode atuar como uma CA e auto assinar seu certificado, porém neste cenário os navegadores de internet não serão capazes de validar seu certificado, assim no processo de negociação o protocolo de criptografia não será capaz de executar o reconhecimento completo do certificado, o que deverá exibir no navegador aquela mensagem do tipo "Sua Conexão não é particular" ou "Existe um problema com o certificado de segurança deste web site" pois este não foi assinado por uma unidade certificadora.

---

### A importância das Ciphers Suites

Uma cipher suite é basicamente uma lista de algoritmos utilizada em uma conexão com o protoclo TLS, conforme abordamos a pouco a relação de cifras que poderão ser utilizadas em uma conexão é um assunto a ser definido entre nosso navegador local e o servidor durante o processo de construção da conexão criptografada, chamamos esse de negociação de cifras, a partir dessa negociação o servidor saberá a capacidade de criptografia que o cliente tem e vice versa.

Exemplo de uma cifra de criptografia: ***TLS_ECDHE_ECDSA_WITH_AES_256_CBC_SHA384***

O comando openssl pode ser utilizado para o detalhamento técnico do que compoe uma cifra:

```sh
openssl ciphers -V ECDHE-RSA-AES128-GCM-SHA256
0xC0,0x2F - ECDHE-RSA-AES128-GCM-SHA256 TLSv1.2 Kx=ECDH     Au=RSA  Enc=AESGCM(128) Mac=AEAD
```

Basicamente o que temos na saída deste comando é o seguinte:

- ***Kx=ECDH:*** Algoritmo de curva eliptica  do tipo Diffie Hellman, trata-se do algoritmo matemático de criptografia assimétrica usado pela cifra, sua função é garantir a primeira parte do handshake;

- ***Au=RSA:*** Algoritmo de assinatura usado para autenticação no momento da troca de chaves;

- ***Enc=AESGCM(128):*** O AES é o algoritmo de criptografia simétrica, utilizado na comunicação, já o GCM o modo de operação que provê confidencialidade e autenticação de origem e fechando, o valor 128 refere-se ao tamanho da chave que será gerada para a criptografia simétrica;

- ***Mac=AEAD:*** Abreviação do termo "Authenticated Encryption with Associated Data" colocando de forma simples é uma interface para algoritmos de criptografia, descrita um pouco mais detalhadamente na [rfc5116](http://www.rfc-base.org/txt/rfc-5116.txt);


####  A escolha do seu Cipher Suite:

É muito importante que o Developer atente-se para a escolha do Cipher Suite de seu servidor/aplicação ( Lembrando que este item fica por conta da tecnologia responsável por publicar seu conteúdo, em muitos casos um web server IIS, Apache ou Nginx ) pois o navegador pode "se negar" a estabelecer uma conexão caso as cifras fornecidas pelo servidor estejam desatualizadas, ou quem sabe "atualizadas demais" que é mais ou menos o que ocorre ao utilizar sistemas operacionais muito antigos como o windows XP ou navegadores muito desatualizados como o IE6.

Além disso tem a questão da segurança, cifras antigas em geral utilizam algoritmos mais antigos de criptografia e portanto mais fracos ou descontinuados, alguns destes podem ser vulneráveis ao ponto de serem quebrados comprometendo a segurança de sua conexão.

A dica mais importante para a escolha das cifras é confiar na documantação de sua plataforma, dai outro ótimo motivo para se ter um web server a frente de sua aplicação, além disso existe uma ótima opção de auxílio, o site [cipherli.st](https://cipherli.st/) funciona como um tipo de recomendação sobre quais as melhores cifras em uso para as principais plataformas do mercado.

[[images/cipherli.st.png]]

---

### Como saber se minha aplicação está indo no caminho certo?

Se tratando de criptografia de tráfego existem muitas variaveis que podém comprometer a segurança e confiabilidade de sua plataforma, felizmente também existem projetos na internet que fornecem mecanismos para testar essa segurança e confiabilidade sendo o [ssllabs](https://www.ssllabs.com/) o mais famoso e provavelmente o mais útil devido ao detalhamento de seus resultados;

Outras possibilidades:

- [ssllabs.com](https://www.ssllabs.com/)
- [www.wormly.com](https://www.wormly.com/)
- [digicert.com](https://www.digicert.com/)

---
# Usando o HSTS para conversão em HTTPS:

Considere como exemplo uma requisição para http://paypal.com.br/home executando esta chamada com o Google Chrome em modo de análise com o  "Developer Tools" você verá que o navegador acabou convertendo a sua requisição http em https, isso ocorre devido existência de um metadado chamado HSTS ( Strict Transport Security ), esse metadado foi enviado como retorno pelo site dO PayPal "forçando" o uso de HTTPS como protocolo padrão, essa configuração é um requisito importante de segurança ao estruturarmos uma página para responder em HTTPS, ***Na prática o HSTS é utilziado pelo servidor para informar ao navegador que a conexão entre ambos só pode ser feita de forma segura.***

> Existem outras formas de forçar o uso de HTTPS, a mais comum e provavelmente a mais usada até então é o redirecionamento forçado via webserver, ( Verificaremos como fazê-lo em algum momento do curso ), entretanto colocando de forma simples, uma coisa não subtitui a outra e se vier a substituir será o uso do HSTS em detrimento do redirecionamento tradicional.

O exemplo abaixo demosntra a captura do momento em que o metadado HSTS é recebido como header usando o Developer Tools do Google Chrome;

[[images/hsts1.png]]

[[images/hsts2.png]]

Na imagem ao acesarmos um site pela primeira vez, ele retornou uma mensagem ao navegador dizendo que toda vez que o site for acessado, a requisição deve ser feita via HTTPS, na mensagem temos o tempo valido da prefência dada ao navegador definido em 2 anos ( max-age=63072000 ), o browser registra essas informações e armazena. Toda vez que o site for requisitado, mesmo se o usuário tentar acessar via HTTP, o navegador só realizará o acesso via HTTPS.

Para que isso funcione o navegador deverá possuir suporte a HSTS, hoje em dia a grande maioria dos navegadores já possuem esse suporte, até mesmo o IIE e o Edge da Microsoft que demoraram cerca de um ano para aderir ao HSTS, a [RFC6797](https://tools.ietf.org/html/rfc6797) que descreve o uso de HSTS foi publicada pela IETF em Novembro de 2012;

### FAQ: Questões efetivas sobre HSTS e criptografia:

***Como implementar o HSTS?***

O HSTS é inserido via metadado, por tanto pode ser adicionado tanto no webserver ( No caso do apache e do NGINX ) como diretamente na programação da página, esse padrão é relativametne novo e já é utilizado por empresas como Google, Paypal e Twitter, faremos testes relativos a implementação no Apache e no NGINX no decorrer do curso, com relação a implementação no código considere os links abaixo como referência:

* [MDN: Strict-Transport-Security](https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Strict-Transport-Security)

* [Projeto Chromium: HTTP Strict Transport Security](https://www.chromium.org/hsts)

Outra boa referência pode ser obtida dando uma lida na página da [wikipédia](http://en.wikipedia.org/wiki/HTTP_Strict_Transport_Security) sobre o assunto, lá existem bons exemplos de referência baseados em código;

***Devo corrrer e implementar HSTS imediatamente?***

Definitivamente não, mesmo que o pentester ou analista de segurança responsável diga o contrário, conforme strogonoficamente descrito no artigo publicado no site [codeenigma.com](https://www.codeenigma.com/host/blog/understanding-hsts), a implementação de HSTS demanda uma bom conhecimento do site e de sua infraestrutura, a principal pergunta a ser respondida antes de implementar esse recurso é: **Todo o conteúdo dessa URI atende em HTTPS?**, não começe qualquer ação de implementação sem que essa pergunta seja respondida.

***Tem alguma outra forma de fazer isso?***

Empresas como Google e Mozilla tem dedicado bastante tempo e investimento na idéia de que todos os usuários devem utilizar apenas o protocolo HTTPS tornando o trafego de dados e a internet mais segura, nesse aspecto foi criada uma extensão para alguns navegadores que ativa automaticamente o protocolo HTTPS em qualquer site que o usuário navegar. O nome dessa extensão é “https everywhere” e está disponível para download na Internet, outra possibilidade conforme já descrito é a implementação direta no webserver, mas como dito anteriormente falaremos sobre isso em breve.


---

### O google e sua bandeira pelo uso de HTTPS:

[[images/chrome-logo.png]]

Criptografia é um item essencial no trato de questões de seugrança digital, neste caso em especial estamos abordando a criptografia na conexão cliente servidor, ou seja, o uso do protocolo HTTPS e sua implementação em aplicações que envolvam tráfego de dados seja em redes locais ou através da internet, para se ter uma idéia o proprío Google tem se movimentado com iniciativas de certa forma agressivas para garantir a migração da internet do protocolo HTTP para HTTPS, para saber mais sobre essa questão em específico vale uma lida nos links abaixo:

* [Google Security Blog: Indexing HTTPS pages by default](https://security.googleblog.com/2015/12/indexing-https-pages-by-default.html)
* [Google to slap warnings on non-HTTPS sites](https://nakedsecurity.sophos.com/2016/09/09/google-to-slap-warnings-on-non-https-sites/)

***Opinião do Professor:***

A proposta e o pensamento do Google em relação a isso é simples e direta: ***"Browsing the web should be a private experience between the user and the website, and must not be subject to eavesdropping, man-in-the-middle attacks, or data modification"*** o que na opinião deste autor faz muito sentido e mais do que isso, é uma tendência pois faz parte do desenvolvimento da internet e das tecnologias envolvidas.

---

# Offtopic: Algoritmos de Hash

Falando em criptografia existe um certo assunto relacionado princiaplmente ao pilar de integridade, os Algoritmos de Hash, a funcionalidade deste tipo de algoritmo é garantir a integridade de um arquivo, fundamentalmente este algoritmo opera da seguinte forma:

1. O Algoritmo utiliza como base um dado ou arquivo inicial;
2. A partir deste arquivo é extraida uma quantidade de dados que chamaremos de "X" conforme o artigo original;
3. Para essa quantidade de dados extraida é executado um calculo numério e retornado um valor "Y" com tamanho conhecido;
4. Como o valor "Y" foi baseado no dado inicial de "X", qualquer alteração nos dados "X" geraria um valor "Y" completamente diferente;
5. Dessa forma, não há 2 valores de "X" diferentes que causem o mesmo valor de saída "Y" ( Matematicamente falando não é impossível mas a probabilidade é infinitamente baixa );
6. Sendo assim tendo o valor para "X", é possível calcular "Y" facilmente;
7. Porém dado "Y", é quase impossível calcular "X" novamente; ( Logo, não é possível achar o valor que originou a Hash );

Existe uma enorme variedade de algoritmos de Hash, os mais usados são o MD5 e o SHA;

> Quando se baixa um arquivo como por exemplo o tomcat ou alguma outra aplicação opensource geralmente há, no mesmo diretório, um arquivo contendo a Hash MD5 ou SHA que pode ser utilizado exatamente para veritificar a integridade do download conforme no exemplo abaixo:

Faça o download do código fonte do Tomcat no [Site do Projeto](https://tomcat.apache.org/download-80.cgi);

Utilize preferencialmente a versão com compressão "tar.gz", ao lado do link para download você encontrará os hahs em pgp, md5 e sha1;

```sh
# cd /tmp
# wget http://mirror.nbtelecom.com.br/apache/tomcat/tomcat-8/v8.5.11/bin/apache-tomcat-8.5.11.tar.gz
```

> Tendo o arquivo compactado no servidor verifique o hash sha1 descrito anteriormente direto no site ( ao lado do link de download ) ou usando [este link](https://www.apache.org/dist/tomcat/tomcat-8/v8.5.11/bin/apache-tomcat-8.5.11.tar.gz.sha1).

Utilize o comando openssl para extrair um hash do arquivo baixado usando o algoritimo sha1, compare o valor obtido com o hash original salvo no site:

```sh
# openssl dgst -sha1 /tmp/apache-tomcat-8.5.11.tar.gz
# curl https://www.apache.org/dist/tomcat/tomcat-8/v8.5.11/bin/apache-tomcat-8.5.11.tar.gz.sha1
```

Tenha em mente que o valor contido no site do tomcat é um hash obitido a partir do arquivo original disponibilizaod para download, já "do nosso lado" acabamos de extrair outro hash sha1 do mesmo arquivo, se tudo ocorreu bem e se o arquivo foi baixado integralmente nosso resultado será identifico ao valor extraido do site, o que valida a consistencia do arquivo que foi baixado com base em um teste de algoritimo hash;

---

## Material de Referência:

Página original utilizada como base para o tópico sobre Hash:

* [Algoritmos de Hash Criptográficos, segurancainformacao.wordpress.com](https://segurancainformacao.wordpress.com/2008/12/16/algoritmos-de-hash-criptograficos/)


Construtor de hashs online com diversos padrão de criptografia disponíveis:

* [hashemall.com](http://www.hashemall.com/)

Esse vídeo publicado no canal dtommy1979 exibe uma animação simples e bem sucinta sobre o conceito de Certificado SSL ( O mesmo conceito se aplic ainda hoje ao uso de TLS ) e criptografia de websites:

* [SSL Certificate Explained](https://www.youtube.com/embed/SJJmoDZ3il8)

Esse segundo vídeo é consideravelmente mais complexo e consequentemente mais enrriquecedor, trata-se de uma aula sobre criptografia publicada no canal Hacker House sobre criptografia explicada pela visão e com foco em desenvolvedores:

* [Hacker House, Criptografia: Entendendo o HTTPS](https://www.youtube.com/embed/ecM7k1OhTwA)

Artigo publicano no iMasters sobre importância no uso de HTTPS e sua relação com HSTS:

* ["HSTS – Meu HTTPS não está seguro?" iMasters](http://imasters.com.br/infra/seguranca/hsts-meu-https-nao-esta-seguro/?trace=1519021197&source=single)


Página do codeenigma com boa referência sobre o uso de HSTS:

* [Understanding HSTS, codeenigma.com](https://www.codeenigma.com/host/blog/understanding-hsts)


Artigo escrito por Guto Carvalho em linguagem simples e muito didatica sobre HSTS:

* [Entendendo o HSTS, Guto Carvalho](http://gutocarvalho.net/octopress/2012/11/29/entendendo-o-hsts/)


Documentação oficial da OWASP sobre HSTS:

* [Documentação OWASP: HSTS](https://www.owasp.org/index.php/HTTP_Strict_Transport_Security_Cheat_Sheet)

----

**Free Software, Hell Yeah!**

