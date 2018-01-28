# Continuous Delivery (Entrega ou Delivery Contínuo)

Segundo a definição publicada no artigo ["O que significa distribuição contínua?
"](https://aws.amazon.com/devops/continuous-delivery/) publicado na Amazon, *Continuous Delivery é uma prática de desenvolvimento de software DevOps em que alterações de código são criadas, testadas e preparadas automaticamente para liberação para produção* Essa definição é interessante pois reformça a idéia de que todo o concieot DevOps é baseado em culturas, implementadas a partir de práticas que utilizam ferramentas.

Essa ideia pode ser analisada como uma evolução ou o próximo passo após a [integração continua](https://github.com/2TINsecdevops/classroom/blob/master/content/concepts/ci.md), ou seja, uma vez que o processo de integração e teste automatizado de código seja implementado é possível gerar de forma automática a versão ou artefato pronto para entrada em produção. Dessa forma cada alteração de código criada, é testada e enviada para um ou vários estágios subsequentes de validação para que por fim seja aprovada e implementada em produção.

***Continuos Deployment (Deploy Contínuo)***

É comum que no começo a terminologia seja confusa principalmente devido a um terceiro elemento (Além de ci e cd) que engloba pŕaticas devops para entrega de código, esse elemento é chamado de Deployment Contínuo (Se eu tentar abreviar chamaria de cd ai ficaria mais confuso ainda =D ), a diferença entre delivery e deploy é sútil e se dá apenas no processo de entrega em produção, no modelo conhecido como "Contínuos Delivery" descrito acima existe um processo manual de aprovação, já no Contínuos Deployment a aprovação é automática, o que faz deste o estágio final de um modelo 100% ágil e consequentemente o mais díficil de ser alcançado.

A imagem abaixo foi retirada do paper já citado da amazon e ilusta bem os três modelos e as respectivas diferenças entre eles:

![alt tag](https://github.com/2TINsecdevops/classroom/raw/master/content/images/1.3-continuous_integration.png)
