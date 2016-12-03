<?php

function selectCategory() {

    $query = "SELECT * FROM categorie";
    $data = execute_query($query);
    return $data;
}

function selectCategoryOfTopic($id_category) {
    $query = "SELECT * FROM categorie WHERE id_category = ".$id_category;
    $data = execute_query($query);
    return $data;
}