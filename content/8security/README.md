# Reduzindo o Escopo

> É comum e até corriqueiro que o conceito de segurança seja relacionado quase que exclusivamente a eventos relacionados a ataques, roubo de informações e negação de serviços, isso provavelmente ocorre devido ao quão interessante essa área se mostra e todo o encanto envolvido nessa "coisa de hacker"; na prática a coisa é bem mais abrangente, questões relacionadas a segurança da informação estão muito além desse escopo, alias, estão muito além do escopo de tecnologia...

---
![alt tag](https://github.com/fiapsecdevops/classroom/raw/master/content/pexels/uji8nqd.jpg)
---

Questões e práticas relacionadas a segurança da informação estarão presentes em quaisquer situações em que haja tratamento de informação:

- Registros de Negócios;
- Bases de Dados;
- Informações Pessoais;
- Informações Corporativas;
- Registros Financeiros;
- Registros de Transações;

Resumindo essa pequena história a segurança da informação relaciona-se a todo e qualquer evento que envolva a informação, em nosso contexto o foco é bem especifico: **Segurança no Desenvolvimento de Código** e consequente  na informação contida e **Segurança na disponibilização de Conteúdo**, ou seja, na maneira como suas informações são expostas, neste caso dentro da arquitetura de **Sistemas para Internet**;

> A proposta dessa disciplina é abordar questões importantes relacionados a segurança e desenvolvimento de forma técnica, conceitual em alguns momentos mas sempre embasado em prática e testes para comprovação de conceitos, o foco em segurança se dará no ambito dos eventos que envolvem desenvolvimento para internet, criptografia, arquitetura, identificação de vulnerabilides e Boas Práticas;

## Os tais pilares...

Muitos estudos relacionados a segurança da informação baseiam-se na categorização em três áreas: 

- Confidencialidade;
- Integridade;
- Disponibilidade;

Resumidamente posso tentar descrever essas aŕeas da seguinte forma:

- ***Confidencialidade:*** Controle de acesso à informação e disponibilização apenas para as entidades que tenham permissão, ou seja que necessitam ter acesso a informação;

- ***Integridade:*** Necessidade de garantir que a informação mantenha todas as suas características originais; 

- ***Disponibilidade:*** Propriedade que define que determinada informação esteja sempre disponível para o acesso quando necessário, de maneia íntegra e fidedigna; 

Esse terceiro pilar é provavelmente o mais famoso e meio que o "hype" da área no momento, muitos tipos de ataques são voltados a comprometer essa disponibilidade inflingindo o chamado "Downtime" sobre um determinado seguimento de dados, por exemplo a home de um portal de conteúdo ou e-commerce ou a página de autenticação de uma aplicação. 

> É ai que se encaixam o uso de estratégias de DDOS e DOS como estudaremos durante a disciplina, a questão é que para muitas empresas e organizaçãoes um evento dessa natureza com duração de minutos pode acarretar prejuízos estrondosos...

## Normas e Padrões:

Assim como a maioria das aŕeas de estudo que compoem as áreas de tecnologia na Segurança da Informação existem alguns padrões relevantes a serem levados emconsideração e que poderão ser citados/aprofundados durante o curso:

- [ISO 27001](http://www.iso.org/iso/home/store/catalogue_tc/catalogue_detail.htm?csnumber=54534)

A ISO 27001 é uma norma internacional publicada pela International Standardization Organization (ISO) e descreve como gerenciar a segurança da informação em uma organização, A versão mais recente desta norma foi publicada em 2013, e seu título completo agora é ISO/IEC 27001:2013;

- [ISO 27002](http://www.iso.org/iso/home/store/catalogue_tc/catalogue_detail.htm?csnumber=54533)

Baseada na norma ISO 27001, a norma propoe boas práticas de segurança da informação, indicando uma série de possíveis controles dentro de cada contexto da área de segurança;

- Basileia III

Neste caso trata-se de uma norma voltada a conceitos de segurança e padronização especificos para área contábil, a norma norma fixa-se em três pilares e 25 princípios básicos sobre contabilidade e supervisão bancária. 

- [PCI-DSS](https://www.pcisecuritystandards.org/document_library?category=saqs)

Sigla para "Payment Card Industry Data Security Standard", outra padronização de cunho e aŕea especifica de atuação: Meios de Pagamento, criada para auxiliar e padronizar as organizações que processam pagamentos por cartão de crédito na prevenção de fraudes, através de maior controle dos dados e sua exposição.

- ITIL

Conjunto de boas práticas para gestão, operação e manutenção de serviços de TI, aplicados na infraestrutura.

- COBIT

Guia de boas práticas, como um framework, voltadas para a gestão de TI. Inclui, em sua estrutura de práticas, um framework, controle de objetivos, mapas de auditoria, ferramentas para a sua implementação e um guia com técnicas de gerenciamento.

- [NIST 800](http://csrc.nist.gov/publications/PubsSPs.html)

National Institute of Standards and Technology, Base de documentação voltada para a área de segurança da informação. Essa série é composta de documentos considerados "Special Publications", os quais abordam desde segurança na tecnologia Bluetooth, até segurança em servidores.

## Cybersecurity: It’s All About the Coders | Dan Cornell | TEDxSanAntonio:

Apresentação de Dan Cornell no TEDxSantAntonio sobre a importância do Código em Cybersecurity;

*- [It’s All About the Coders](https://www.youtube.com/embed/fi44mL7mcq0)

## Material de Referência

* [Cirt.net Manuais de uso do Nikto](https://cirt.net/nikto2-docs/)

---

**Free Software, Hell Yeah!**
