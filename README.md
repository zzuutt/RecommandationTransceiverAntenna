# RecommandationTransceiverAntenna
##for Thelia 2

Ce module vous permet d'ajouter des recommandations à des categories de produit par rapport a d'autres categories

## installation

le module doit être placé dans le repertoire ```modules/``` (thelia/local/modules/).

## utilisation

2 boucles sont rajoutées:

__Use the RecommandationTransceiverAntenna loop (liste les produits ayant une recommandation)__
```html
{loop name="recommandation" type="RecommandationTransceiverAntenna" transceiver_id="product_id" antenna_id="product_id" recommandation_id="id"}
    ...
{/loop}
```

__Use the RecommandationTransceiverAntennaRecommandation loop (liste les recommandations)__
```html
{loop name="recommandation" type="RecommandationTransceiverAntennaRecommandation" id="recommandation_id" code="code"}
    ...
{/loop}
```

3 extensions smarty:

__Verifier si un produit est associé à une recommandation__
```html

```
