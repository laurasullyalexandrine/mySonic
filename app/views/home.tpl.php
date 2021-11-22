
<main id="wrappers">
<table class="characters_list">

    
    <tr>
    <th class="characters_subtitle">picture</th>
    <th class="characters_subtitle">name</th>
    <th class="characters_subtitle">type</th>
    <th class="characters_subtitle">description</th>
    </tr>

    <!--Utilisation d'une bouble FOR pour afficher les données de la table 'Character'
Utilisation de la variable $currentCharacters qui stocke sous forme d'objet la fonction findAllCharacters()-->
    <tr>
    <?php for ($i = 0; $i <= 12; $i++): ?>
        <?php $currentCharacters = $home_characters [$i]; // dump($currentCharacters); ?>
        
        <td class="characters_elements">
        <img class="characters_elements-pictures" src="assets/images/<?= $currentCharacters['picture']?>" width="110px" height="120px" alt="Pictures's characters">
        </td>
        <td class="characters_elements-name"><?=$currentCharacters['name']?></td>
        <td class="characters_elements-type"><?=$currentCharacters['type_name']?></td>
        <td class="characters_elements-description"><p><?=$currentCharacters['description']?></p></td>
    </tr>
    <?php endfor; ?>
    
</table>
</main>