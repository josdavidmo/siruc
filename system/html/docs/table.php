<?php

class table {

    private $id = null;
    private $data = null;
    private $titles = null;
    private $title = null;
    private $db = null;
    private $table = null;
    private $cols = null;
    private $types = null;

    /**
     * Cosntructor de la clase.
     * @param \PersistenceImpl $db
     */
    public function __construct($db, $id) {
        $this->db = $db;
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    public function getData() {
        return $this->data;
    }

    public function getTitles() {
        return $this->titles;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setTitles($titles) {
        $this->titles = $titles;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function setTable($table) {
        $this->table = $table;
    }

    public function setCols($cols) {
        $this->cols = $cols;
    }

    public function setTypes($types) {
        $this->types = $types;
    }

    private function buildData() {
        $table = $this->table;
        $auxCols = "*";
        if (!empty($this->cols)) {
            $auxCols = implode(",", $this->cols);
        }
        $query = "SELECT $auxCols FROM $table";
        $this->data = $this->db->executeQuery($query);
    }

    public function renderTable() {
        $this->buildData();
        ?>
        <script>

            var types = ['<?= implode("','", $this->types) ?>'];

            function hiddeRow(row) {
                $("#editar_" + row).toggle(500);
                $("#borrar_" + row).toggle(500);
                for (var i = 0; i <<?= count($this->data[0]) ?>; i++) {
                    $("#txt_" + row + "_" + i).toggle(500);
                    $("#lb_" + row + "_" + i).toggle(500);
                }
            }

            function addRow(idTable) {
                var table = document.getElementById(idTable).getElementsByTagName('tbody')[0];
                var length = table.rows[0].cells.length;
                var row = table.insertRow(-1);
                for (var i = 0; i < (length - 1); i++) {
                    var cell = row.insertCell(i);
                    var input = document.createElement("input");
                    input.type = types[i];
                    input.id = "add_text_" + i;
                    input.name = "add_text_" + i;
                    cell.appendChild(input);
                }
                cell = row.insertCell(length-1);
                var buttonAgregar = document.createElement("button");
                var textAgregar = document.createTextNode("Guardar");
                buttonAgregar.value = "Guardar";
                buttonAgregar.onclick = function() {saveAdd(length);};
                buttonAgregar.appendChild(textAgregar);
                var buttonEliminar = document.createElement("button");
                var textEliminar = document.createTextNode("Eliminar");
                buttonEliminar.value = "Eliminar";
                buttonEliminar.appendChild(textEliminar);
                cell.appendChild(buttonAgregar);
                cell.appendChild(buttonEliminar);
            }

            function saveAdd(length) {
                var table = "<?= $this->table ?>";
                var cols = "<?= implode(",", $this->cols) ?>";
                var values = [];
                for(var i=0; i < (length - 1); i++){
                    values.push($("#add_text_"+i).value);
                }
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                        alert(xmlhttp.responseText);
                    }
                };
                xmlhttp.open("GET", "system/modules/configuration/modules.php?task=add&table="+ table + "&cols=" + cols + "&values=" + values.toString(), true);
                xmlhttp.send();
            }
        </script>
        <h2 class="sub-header"><?= $this->title ?></h2>
        <div class="table-responsive">
            <table class="table table-striped" id="<?= $this->id ?>">
                <?php if (!empty($this->titles)) { ?>
                    <thead>
                        <tr>
                            <?php foreach ($this->titles as $title) { ?>
                                <th><?= $title ?></th>
                            <?php } ?>
                        <tr>
                    </thead>
                <?php } ?>
                <tbody>
                    <?php $i = 0; ?>
                    <?php foreach ($this->data as $row) { ?>
                        <?php $j = 0; ?>
                        <tr ondblclick="hiddeRow('<?= $i ?>')">
                            <?php foreach ($row as $cell) { ?>
                                <td>
                                    <span id="lb_<?= $i ?>_<?= $j ?>"><?= $cell ?></span>
                                    <input id="txt_<?= $i ?>_<?= $j ?>" type="<?= $this->types[$j] ?>" value="<?= $cell ?>" hidden>
                                </td>
                                <?php $j++; ?>
                            <?php } ?>
                            <td class="col-md-2">
                                <button id="editar_<?= $i ?>" hidden>Guardar</button>
                                <button id="borrar_<?= $i ?>" hidden>Borrar</button>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td><button id="agregar" onclick="addRow('<?= $this->id ?>')">Agregar</button></td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <?php
    }

}
