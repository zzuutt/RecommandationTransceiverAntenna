# RecommandationTransceiverAntenna
##pour Thelia 2

Ce module vous permet d'ajouter des recommandations à des categories de produit par rapport a d'autres categories

## installation

le module doit être placé dans le repertoire ```modules/``` (thelia/local/modules/).

## utilisation

2 boucles sont rajoutées:

__Use the recommandationtransceiverantenna loop (liste les produits ayant une recommandation)__
```smarty
{loop name="recommandation" type="recommandationtransceiverantenna" transceiver_id="product_id" antenna_id="product_id" recommandation_id="id"}
    ...
{/loop}
```
#### Input arguments

|Argument |Description |
|---      |--- |
|**id**   | A single or a list of ids. |
|**transceiver_id** | A single id. |
|**antenna_id** | A single id. |
|**recommandation_id** | A single id. |

#### Output arguments

|Variable       |Description |
|---            |--- |
|ID            | The feature type id |
|TRANSCEIVER_ID     | The feature type transceiver_id |
|ANTENNA_ID    | The feature type antenna_id |
|RECOMMANDATION_ID    | The feature type recommandation_id |


__Use the recommandationtransceiverantenna_recommandation loop (liste les recommandations)__
```smarty
{loop name="recommandation" type="recommandationtransceiverantenna_recommandation" id="recommandation_id" code="code"}
    ...
{/loop}
```
#### Input arguments
|Argument |Description |
|---      |--- |
|**id**   | A single or a list of ids. |
|**code** | A single code. |

#### Output arguments

|Variable       |Description |
|---            |--- |
|ID            | The feature type id |
|IS_TRANSLATED     |  |
|LOCALE    | The feature type locale |
|CODE    | The feature type code |
|TITLE    | The feature type title |


3 extensions smarty:

__Verifier si un produit est associé à une recommandation__

produit de la categorie a t'il une recommandation ?     return: true / false
```smarty
{transceiver_has_recommandation transceiver_id="id"}
```
produit de la categorie a t'il une recommandation ?     return: true / false
```smarty
{antenna_has_recommandationn antenna_id="id"}
```
c'est 2 produits ont ils une recommandation ?     return: true / false
```smarty
{transceiver_with_antenna_has_recommandation transceiver_id="id" antenna_id="id"}
```
