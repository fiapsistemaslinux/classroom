!SLIDE transition=fade

# Gestão de Configuração e Boas Práticas de Desenvolvimento

> Como o valor é criado somente quando nossos serviços estão em produção, devemos garantir que não apenas fornecemos fluxo rápido, mas que nossas implantações também podem ser realizadas sem causar caos e interrupções, como interrupções de serviço, deficiências de serviço ou segurança ou conformidade falhas...

.callout.info `Trecho do livro "The DevOps Handbook" de Gene Kim,‎ Jez Humble, Patrick Deboi, John Willis`

!SLIDE incremental transition=fade

# Boas Práticas de Desenvolivmento de Software

- Ao falarmos em boas práticas temos uma grande variedade de processos e soluções tanto para integração quanto para testes e geração de releases que facilitam e/ou são pré-requisitos para uma implementação prática da cultura DevOps;

- Embora a melhoria de processos e o gerenciamento dos times seja a questão principal do ponto de vista da Gestão de Projetos é muito interessante conhecer estes outros mecânismos a fim de auxiliar em escolhas e definições de como os processos deverão ser implementados na prática;

!SLIDE incremental transition=fade

# Boas Práticas de Desenvolivmento de Software

No que diz respeito a cultura e metodologias ágeis para desenvolvimento é comum ouvirmos o termo **Arquiteturas Modernas** essa matéria trata da escolhas de arquiteturas que sejam focadas em:

- **Agilidade:** Uso de multiplas camadas e plataformas mais granulares a fim de separar camadas como lógica de regras de negócio e interface de usuário ou mesmo funcionalidades dentro de uma interface como foi muito bem explicado dentro do vídeo Spotify Engineering Culture;

- **Mobilidade:** Aplicações capazes de serem implementadas em mais de um tipo de plataforma, prontas para o uso em Cloud Computing, entregues com base em automação, infra estrutura codificada (iac) e principlamente escaláveis (**na maioria dos casos horizontalmente**); 

- **Funcionalidae:** Soluções baseadas em mobile ou interfaces web, que possam ser simplesmente acessadas a partir de uma navegador ou celular casos onde a atualização é facilitada o que aumenta a agilidade e melhora a experiência de usuário e o trabalho dos times de IT.


!SLIDE incremental  transition=fade

# Boas Práticas de Desenvolivmento de Software

**The Old Way**

No Paper [Building the Modern Application Architecture](https://www.nginx.com/resources/library/building-modern-application-architecture/) publicado no Blog do Projeto Nginx existe um trecho específico descrevendo o modelo tradicional de arquiteturas como **The Old Way:**

> Nos primeiros dias da transição para o HTTP, as arquiteturas eram principalmente verticais onde sistemas operacionais e plataforma de desenvolvimento (Sun Sparc, Solaris OS, Oracle iPlanet etc.) eram amarradas a soluções especificas de software combinadas a hardware proprietário como balanceadores de carga, controladores para delivery de aplicações, proxies e caches, desenvolvedores eram essencialmente travados em frameworks especificos com pouca ou nenhuma flexibilidade... 

!SLIDE incremental  transition=fade

# Boas Práticas de Desenvolivmento de Software

**The New Way**
 
No mesmo Paper [Building the Modern Application Architecture](https://www.nginx.com/resources/library/building-modern-application-architecture/) o trecho seguinte descreve as novas arquiteturas e tendências para desenvolvimento:

> Graças à crescente variedade de ferramentas e à mudança de paradigmas de desenvolvimento de software, arquitetos começaram a finalmente se **afastar das tradicionais pilhas verticais para arquiteturas web distribuídas.** Novas linguagens e frameworks apareceram (Go, Angular, Python, Ruby, Node.js, Scala e etc) e foram popularizadas rapidamente porque permitiam que os desenvolvedores codificassem e implantassem rapidamente hardware e software...

*Vertical was out. Horizontal was in. And with this new way to architect for web applications*

!SLIDE incremental  transition=fade

# Boas Práticas de Desenvolivmento de Software

**Cloud-native Aplication**

- Um ponto em comum encontrado em empresas como Uber, Netflix, Airbnb, Amazon ou Spotify é que todas essas empresas são rechonhecidas por características que facilitam seus processos de inovação:

    - Velocidade de entrega e capacidade de geração de releases;
    - Serviços amplamente disponíveis;
    - Escalabilidade;
    - Experiências de usuários focadas em dispositivos móveis;

- Entre esses patterns que possibilitam essas caracteristicas está o conceito descrito como **Cloud Native Aplication:**

- Chamamos de Cloud-native **a abordagem usada para criar e executar aplicações que exploram as vantagens do modelo de entrega de computação em nuvem.**

!SLIDE incremental  transition=fade

# Boas Práticas de Desenvolivmento de Software

Segundo Mark Andreessen no Paper [Cloud-Native Application Architectures](https://www.nginx.com/resources/library/cloud-native-applications/)

*Mover para a cloud é uma evolução natural das demandas atuais de implementação de software e aplicações/arquiteturas do tipo cloud-native são o centro de como essas empresas essas empresas obtiveram seu caráter disruptivo.*

.callout.info `Com base na lógica do que se propõe a ser uma Arquiteutra Moderna alguns novos Patters para desenvolvimento de software começaram a surgir, ou seja a adoção dessas arquiteturas em meio a cultura DevOps altera drasticamente a maneira como os desenvolvedores devem codificar aplicações;`

!SLIDE incremental  transition=fade

# Boas Práticas de Desenvolivmento de Software

**Twelve-Factor Applications**

A questão e motivação do desenvolvimento do tipo Cloud-native envolve várias características-chave, uma delas é a coleção de patterns descrita como **Twelve-Factor Applications:**

- O *Twelve-Factor* é uma coleção de padrões para arquiteturas de aplicações, originalmente desenvolvidas por engenheiros da Heroku.

- Essses padrões descrevem um arquétipo de aplicações com base no que geralmente é pré-requisito para que um software opere conforme esperado utilizando o máximo de recursos e vantagens que o modelo baseado em cloud computing tenha a disposição.

- A lista com os dose componentes pode ser obtida em protuguês neste endereço: [https://12factor.net/pt_br/](https://12factor.net/pt_br/)