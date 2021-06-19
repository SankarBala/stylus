

function deleteRow(e) {
    $(e).parents('tr').remove();
    dataChange();
}

function addRow(e) {
    $(e).parents('tr').after(`
    <tr class=" d-flex justify-content-between">
    <td row-span="1" class="applyTo">
        <select onchange="dataChange()" name="applyToPatern" class="applyToForm">
            <option value="url">Url </option>
            <option value="domain">Domain </option>
            <option value="url-prefix">Url prefix </option>
            <option value="regexp">Regular expression </option>
        </select>
    </td>
    <td row-span="3" class="applyPattern">
        <input onkeyup="dataChange()" type="text" class="applyToForm" placeholder="Write here" id="option"
            name="applytoText">

    </td>
    <td row-span="1" class="applyBtn">
        <button onClick="deleteRow(this)" type="button" class="deleteRow applyToForm btn btn-danger d-inline"> - </button>
        <button onClick="addRow(this)" type="button" class="addNewRow applyToForm btn btn-success d-inline"> + </button>
    </td>
</tr>
    `);
    dataChange();
}


function dataChange() {

    let editorValue;
    let editedEditorValue;
    let applyTo="@-moz-document ";

    // let userScriptPart = codemirrorEditor.getValue().match(/(\/\* ==UserStyle==)(.+?)(==\/UserStyle== \*\/)/gs);
    // let applyTo = codemirrorEditor.getValue().match(/(url|domain|regexp|url-prefix)(\()("|')(.+?)("|')\)/gs);
    // let scriptWrapper = codemirrorEditor.getValue().match(/(@-moz-document)(.+?)(\{)/gs);


    scriptName = $('#style').val();
    console.log(scriptName);

    

    $("select").each(function (index, element) {
        applyTo = applyTo.concat(`${element.value}\(\"${$('input[name="applytoText"]')[index].value}\"\), `);
    });
    applyTo = applyTo.trim().slice(0, -1).concat(' \{ ');

    

    editorValue = codemirrorEditor.getValue();

    // editedEditorValue = editorValue.replace(/(\/\* ==UserStyle==)(.+?)(==\/UserStyle== \*\/)/gs, "W3Schools");
    // editedEditorValue = editedEditorValue.replace(/(url|domain|regexp|url-prefix)(\()("|')(.+?)("|')\)/gs, "W3S");
    editedEditorValue = editorValue.replace(/(@-moz-document)(.+?)(\{)/gs, applyTo);


    codemirrorEditor.setValue(editedEditorValue);

}