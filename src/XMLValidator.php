<?php

class XMLValidator
{
    public function validateXML()
    {
        libxml_use_internal_errors(true);

        $objDOM = new DOMDocument();
        $objDOM->load('../archives/dados.xml');

        try{
            if (!$objDOM->schemaValidate('../archives/validarXML.xsd')) {
                $arrayErrors = libxml_get_errors();
                return $arrayErrors;
            } else {
                return '';
            }
        } catch(Exception $e){
            echo 'Erro ao abrir validar com o seguinte erro' . $e;
        }
    }

    public function displayValidationResult()
    {
        $validationResult = $this->validateXML();

        if (is_array($validationResult)) {
            echo '<label class="totalErrors">';
            echo 'Existem <span>' . count($validationResult) . '</span> erros';
            echo '</label>';

            $table = '<table>';
            $table .= '<tr>';
            $table .= '<th class="error">Erro</th>';
            $table .= "<th>Tag</th>";
            $table .= "<th>Descrição do erro</th>";
            $table .= '</tr>';

            foreach ($validationResult as $index => $error) {
                preg_match("/'(.*?)'/", $error->message, $value);

                $table .= '<tr>';
                $table .= "<td class='indexNumber'><span>" . ($index + 1) . '</span></td>';
                $table .= '<td class="tagName">' . $value[1] . '</td>';
                $table .= '<td class="errorDescription">' . $error->message . "</td>";
                $table .= '</tr>';
            }

            $table .= "</table>";
            echo $table;
        } else {
            echo '<p class="validXML">O arquivo XML é válido</p>';
        }
    }
}

$validator = new XMLValidator();
$validator->displayValidationResult();
