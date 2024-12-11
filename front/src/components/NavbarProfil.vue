<script>
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';
</script>

<template>
    <div id="navBarProfil">
        <div>
            <p>Photo</p>
            <p>Pseudo</p>
        </div>
        <div>
            <p>Abonnés</p>
            <p>10</p>
        </div>
        <div>
            <p>Abonnements</p>
            <p>22</p>
        </div>
    </div>
</template>

<style>
#navBarProfil{
    display: flex;
    flex-direction: row;
    border: 1px solid black;
    justify-content: space-around;
    padding-top: 2%;
}

#navBarProfil div{
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
</style>