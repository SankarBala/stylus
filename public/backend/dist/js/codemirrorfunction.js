
$('#style').on('keyup', function(){
   editorValue = codemirrorEditor.getValue();
   editedEditorValue = editorValue.replace(/(@name\s+)(\w+)/gs, `@name                 ${$('#style').val()}`);
   codemirrorEditor.setValue(editedEditorValue);
})

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
            name="applytoText" value=" ">

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
    let applyTo = "@-moz-document ";

    // let userScriptPart = codemirrorEditor.getValue().match(/(\/\* ==UserStyle==)(.+?)(==\/UserStyle== \*\/)/gs);
    // let applyTo = codemirrorEditor.getValue().match(/(url|domain|regexp|url-prefix)(\()("|')(.+?)("|')\)/gs);
    // let scriptWrapper = codemirrorEditor.getValue().match(/(@-moz-document)(.+?)(\{)/gs);


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



function styleEdited() {
    
    let applicableTo = codemirrorEditor.getValue().match(/(url|domain|regexp|url-prefix)(\()("|')(.+?)("|')\)/gs);

    if (applicableTo == null) {
        alert("Sorry at least on scope is needed");
        dataChange();
    } else {
        $("#tbUser").html(" ");
        applicableTo.forEach(function (str, index) {

            option = str.match(/(domain|regexp|url-prefix|url)/gs);
            patern = str.match(/(\".+?\")/gs);

            textValue = patern[0];
            console.log(textValue);


            $("#tbUser").append(`
<tr class=" d-flex justify-content-between">
<td row-span="1" class="applyTo">
    <select onchange="dataChange()" name="applyToPatern" class="applyToForm">
        <option ${option[0] == 'url' ? 'selected' : ''} value="url">Url </option>
        <option ${option[0] == 'domain' ? 'selected' : ''} value="domain">Domain </option>
        <option ${option[0] == 'url-prefix' ? 'selected' : ''} value="url-prefix">Url prefix </option>
        <option ${option[0] == 'regexp' ? 'selected' : ''} value="regexp">Regular expression </option>
    </select>
</td>
<td row-span="3" class="applyPattern">
    <input onkeyup="dataChange()" type="text" class="applyToForm" placeholder="Write here" id="option"
        name="applytoText" value=${textValue} >

</td>
<td row-span="1" class="applyBtn">
   ${index == 0 ? '' : '<button onClick="deleteRow(this)" type="button" class="deleteRow applyToForm btn btn-danger d-inline"> - </button>'}

    <button onClick="addRow(this)" type="button" class="addNewRow applyToForm btn btn-success d-inline"> + </button>
</td>
</tr>
`
            );
        });
    }
}


styleEdited();