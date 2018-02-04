# Conceitos relevantes sobre Microserviços

> ... O estilo arquitetônico do microserviço é uma abordagem para o desenvolvimento de um único aplicativo como um conjunto de pequenos serviços, cada um executando em seu próprio processo e se comunicando com mecanismos leves, muitas vezes uma API de recursos HTTP. Esses serviços são construídos em torno de recursos empresariais e implementáveis independentemente por uma engenharia de deploys automatizados ... ***Autor: Martin Fowler***

---
![alt tag](https://github.com/fiapsecdevops/classroom/raw/master/content/pexels/sdmun6g.jpg)
---

Existem muitas definições interessantes referentes ao conceito de microserviços, uma delas em especial foi publicada no Blog da Rivendel por [Laura Loenert](https://www.linkedin.com/in/lauraloenert) e será tratada como o conteúdo oficial deste capítulo:

* [Guia de microserviços: questões envolvendo segurança, benefícios e complexidade](http://blog.rivendel.com.br/2017/06/30/guia-de-microservicos-questoes-envolvendo-seguranca-beneficios-e-complexidade/)

## A relação entre containers e microserviços

O primeiro ponto a ser esclarecido neste momento é o seguinte: **Containers não são microserviços** na prática pode-se dizer que os coantainers (em especial o Docker) surgem como uma solução interessante para a construção de arquiteturas baseadas em microserviços, isso se deve por uma série de fatores como desacoplação, isolamento de recursos e escalabilidade horizontal por isso o asusnto Docker será discutido em conteúdo específico.

> Neste conteúdo o Docker é usado como principal ferramenta para testes de conceito relacionados a microserviços, implementação de ci e Segurança;

* [Docker](https://github.com/fiapsecdevops/classroom/blob/master/content/3Microservicos/3.1Docker)

## Desafios no processo de implantação

Impletmentar uma aplicação utilizando uma arquitetura distribuida em microserviços é um processo que, quando executado pela primeira vez pode ser extremamente complexo, as mudanças mais relevantes são provavelmente relacionadas a como "pensar" a aplicação e como os módulos se integram, mais díficil ainda é partir de um modelo momolítico rumo a um modelo de microserviços., *considerando minha experiência pessoal, o que tenho visto é muitos times tentando fazer essa conversão de modelo no formato "as is" ou seja, apenas redistribuir a aplicação sem alterar caracteristicas como escalabilidade horizontal, armazenamento de dados etc... *

O artigo [O que aprendi com as mudanças de uma arquitetura monolítica para micro serviços;](https://tech.vivareal.com.br/o-que-aprendi-com-as-mudanças-de-uma-arquitetura-monolítica-para-micro-serviços-90109b57a7bc) publicado por [André Ronquetti Silva](https://tech.vivareal.com.br/@andreronquetti) da [Vivareal](https://www.vivareal.com.br); da um bom exemplo com base na vivência de desenvolvedores sobre o assunto.

---

**Free Software, Hell Yeah!**