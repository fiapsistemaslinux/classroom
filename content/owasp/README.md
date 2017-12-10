# Analise de Vulnerabilidades

[[images/owasp.png]]

**Cada mercado de tecnologia vibrante precisa de uma fonte imparcial de informações sobre as melhores práticas, bem como um corpo ativo defendendo padrões abertos.**

## Conceito:

O Owasp: "Open Web Application Security Project" é uma organização aberta com foco na evolução e melhora continua de soluções e iniciativas sobre segurança da informação e segurança de aplicações e softwares, sua principal e mais relevante caracteristica é a categorização e publicação periódica de relatórios sobre as principais vulnerabilidades exploradas na área técnologica;

Essa base de dados são utilizados em diversos segmentos: frameworks como zap e o w3af, estudos, publicações, testes de penetração e processos de hardening. É verdade que esse mesmo tipo de informação também pode ser encontrada em empresas de segurança e interessados no segmento mas o owasp se destaca extamente por sua imparcialidade não sendo ligado a nenhum "vendor", empresa de segurança ou organização do gênero;

***Como acessar essas informações?***

Toda a informação provida pela owasp está na internet, para entender melhor o projeto vale a pena começar por uma leitura rápida em sua página [Getting Started](https://www.owasp.org/index.php/Getting_Started);

O owasp define sua missão da seguinte forma: 

**Make software security visible, so that individuals and organizations are able to make informed decisions**

---

[[images/owasp-top10.png]]

A categorização mais famosa do owasp é provavelmente seu o ultimo release oficial foi lançado em 2013 ( Existe um update previsto para 2017 além dos relatórios base que são lançados anualmente ) e pode ser acessado em sua versão traduzida para o portugues [nesse link](https://storage.googleapis.com/google-code-archive-downloads/v2/code.google.com/owasptop10/OWASP_Top_10_-_2013_Brazilian_Portuguese.pdf); abaixo os 10 principais focus descritos no relatório da owasp:

* [A1 Injection](https://www.owasp.org/index.php/Top_10_2013-A1-Injection)
* [A2 Broken Authentication and Session Management](https://www.owasp.org/index.php/Top_10_2013-A2-Broken_Authentication_and_Session_Management)
* [A3 Cross-Site Scripting (XSS)](https://www.owasp.org/index.php/Top_10_2013-A3-Cross-Site_Scripting_(XSS))
* [A4 Insecure Direct Object References](https://www.owasp.org/index.php/Top_10_2013-A4-Insecure_Direct_Object_References)
* [A5 Security Misconfiguration](https://www.owasp.org/index.php/Top_10_2013-A5-Security_Misconfiguration)
* [A6 Sensitive Data Exposure](https://www.owasp.org/index.php/Top_10_2013-A6-Sensitive_Data_Exposure)
* [A7 Missing Function Level Access Control](https://www.owasp.org/index.php/Top_10_2013-A7-Missing_Function_Level_Access_Control)
* [A8 Cross-Site Request Forgery (CSRF)](https://www.owasp.org/index.php/Top_10_2013-A8-Cross-Site_Request_Forgery_(CSRF))
* [A9 Using Components with Known Vulnerabilities](https://www.owasp.org/index.php/Top_10_2013-A9-Using_Components_with_Known_Vulnerabilities)
* [A10 Unvalidated Redirects and Forwards](https://www.owasp.org/index.php/Top_10_2013-A10-Unvalidated_Redirects_and_Forwards)

Boa parte do conteúdo descrito nesse relatório será abordado durante as aulas voltadas para temas de Desenvolvimento Seguro;

## Outras informações úteis:

Tão importante quanto conhecer quais são os principais vetores é saber como analisá-los e como avaliar o quanto sua aplicação está ou não vulnerável a eles, para isso um bom ponto de partida é a lista publicada pelo Infosec Resources sobre o assunto: [owasp-top-10-tools-and-tactics](http://resources.infosecinstitute.com/owasp-top-10-tools-and-tactics/);

---

## Material de Referência:

* [Infosecinstitute, owasp-top-10-tools-and-tactics](http://resources.infosecinstitute.com/owasp-top-10-tools-and-tactics/)

* [Owasp - Getting Started](https://www.owasp.org/index.php/Getting_Started)

----

**Free Software, Hell Yeah!**
