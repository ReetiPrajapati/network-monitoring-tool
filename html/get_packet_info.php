<?php
// Check if option and protocol parameters are set
if (isset($_GET['option']) && isset($_GET['protocol'])) {
    $option = $_GET['option'];
    $protocol = $_GET['protocol'];

    // Function to fetch data from a file
    function fetchDataFromFile($filename) {
        $fileContent = file_get_contents($filename);
        // Replace newline characters with <br> to maintain line breaks in HTML
        $fileContent = nl2br(htmlspecialchars($fileContent));
        return $fileContent;
    }

    // Initialize variables to store data types and filenames
    $dataTypes = [];
    $filenames = [];

    // Define data types and filenames based on protocol and option
    switch ($protocol) {
        case 'arp':
            switch ($option) {
                case 'arp_timestamp':
                    $dataTypes = ['ARP Timestamp'];
                    $filenames = ['arp_timestamp'];
                    break;
                case 'arp_srcMAC_add':
                    $dataTypes = ['ARP Source MAC Address'];
                    $filenames = ['arp_srcMAC_add'];
                    break;
                case 'arp_destiMAC_add':
                    $dataTypes = ['ARP Destination MAC Address'];
                    $filenames = ['arp_destiMAC_add'];
                    break;
                case 'arp_framelength':
                    $dataTypes = ['ARP Frame Length'];
                    $filenames = ['arp_framelength'];
                    break;
                case 'arp_srcIPadd':
                    $dataTypes = ['ARP Source IP Address'];
                    $filenames = ['arp_srcIPadd'];
                    break;
                case 'arp_destIPadd':
                    $dataTypes = ['ARP Destination IP Address'];
                    $filenames = ['arp_destIPadd'];
                    break;
                case 'arp_packetlength':
                    $dataTypes = ['ARP Packet Length'];
                    $filenames = ['arp_packetlength'];
                    break;
                case 'arp_ethertype':
                    $dataTypes = ['ARP Ethernet Type'];
                    $filenames = ['arp_ethertype'];
                    break;
                case 'all':
                    $dataTypes = [
                        'ARP Timestamp',
                        'ARP Source MAC Address',
                        'ARP Destination MAC Address',
                        'ARP Frame Length',
                        'ARP Source IP Address',
                        'ARP Destination IP Address',
                        'ARP Packet Length',
                        'ARP Ethernet Type'
                    ];
                    $filenames = [
                        'arp_timestamp',
                        'arp_srcMAC_add',
                        'arp_destiMAC_add',
                        'arp_framelength',
                        'arp_srcIPadd',
                        'arp_destIPadd',
                        'arp_packetlength',
                        'arp_ethertype'
                    ];
                    break;
                default:
                    echo '<tr><td>No data found for selected option.</td></tr>';
                    exit;
            }
            break;
        case 'tcp':
            switch ($option) {
                case 'tcp_timestamp':
                    $dataTypes = ['TCP Timestamp'];
                    $filenames = ['tcp_timestamp'];
                    break;
                case 'tcp_srcmac_add':
                    $dataTypes = ['TCP Source MAC Address'];
                    $filenames = ['tcp_srcmac_add'];
                    break;
                case 'tcp_destmac_add':
                    $dataTypes = ['TCP Destination MAC Address'];
                    $filenames = ['tcp_destmac_add'];
                    break;
                case 'tcp_ethertype':
                    $dataTypes = ['TCP Ethernet Type'];
                    $filenames = ['tcp_ethertype'];
                    break;
                case 'tcp_packetlength':
                    $dataTypes = ['TCP Packet Length'];
                    $filenames = ['tcp_packetlength'];
                    break;
                case 'tcp_srcip_add':
                    $dataTypes = ['TCP Source IP Address'];
                    $filenames = ['tcp_srcip_add'];
                    break;
                case 'tcp_srcport':
                    $dataTypes = ['TCP Source Port'];
                    $filenames = ['tcp_srcport'];
                    break;
                case 'tcp_destip_add':
                    $dataTypes = ['TCP Destination IP Address'];
                    $filenames = ['tcp_destip_add'];
                    break;
                case 'tcp_destiport':
                    $dataTypes = ['TCP Destination Port'];
                    $filenames = ['tcp_destiport'];
                    break;
                case 'all':
                    $dataTypes = [
                        'TCP Timestamp',
                        'TCP Source MAC Address',
                        'TCP Destination MAC Address',
                        'TCP Ethernet Type',
                        'TCP Packet Length',
                        'TCP Source IP Address',
                        'TCP Source Port',
                        'TCP Destination IP Address',
                        'TCP Destination Port'
                    ];
                    $filenames = [
                        'tcp_timestamp',
                        'tcp_srcmac_add',
                        'tcp_destmac_add',
                        'tcp_ethertype',
                        'tcp_packetlength',
                        'tcp_srcip_add',
                        'tcp_srcport',
                        'tcp_destip_add',
                        'tcp_destiport'
                    ];
                    break;
                default:
                    echo '<tr><td>No data found for selected option.</td></tr>';
                    exit;
            }
            break;
        case 'udp':
            switch ($option) {
                case 'udp_Timestamp':
                    $dataTypes = ['UDP Timestamp'];
                    $filenames = ['udp_Timestamp'];
                    break;
                case 'udp_Src_macAdd':
                    $dataTypes = ['UDP Source MAC Address'];
                    $filenames = ['udp_Src_macAdd'];
                    break;
                case 'udp_Desti_macAdd':
                    $dataTypes = ['UDP Destination MAC Address'];
                    $filenames = ['udp_Desti_macAdd'];
                    break;
                case 'udp_Ethertype':
                    $dataTypes = ['UDP Ethernet Type'];
                    $filenames = ['udp_Ethertype'];
                    break;
                case 'udp_packetlength':
                    $dataTypes = ['UDP Packet Length'];
                    $filenames = ['udp_packetlength'];
                    break;
                case 'udp_SrcIP_add':
                    $dataTypes = ['UDP Source IP Address'];
                    $filenames = ['udp_SrcIP_add'];
                    break;
                case 'udp_Srcport':
                    $dataTypes = ['UDP Source Port'];
                    $filenames = ['udp_Srcport'];
                    break;
                case 'udp_DestiIP_add':
                    $dataTypes = ['UDP Destination IP Address'];
                    $filenames = ['udp_DestiIP_add'];
                    break;
                case 'udp_Destiport':
                    $dataTypes = ['UDP Destination Port'];
                    $filenames = ['udp_Destiport'];
                    break;
                case 'udp_Protocol':
                    $dataTypes = ['UDP Protocol'];
                    $filenames = ['udp_Protocol'];
                    break;
                case 'udp_DataLength':
                    $dataTypes = ['UDP Data Length'];
                    $filenames = ['udp_DataLength'];
                    break;
                case 'all':
                    $dataTypes = [
                        'UDP Timestamp',
                        'UDP Source MAC Address',
                        'UDP Destination MAC Address',
                        'UDP Ethernet Type',
                        'UDP Packet Length',
                        'UDP Source IP Address',
                        'UDP Source Port',
                        'UDP Destination IP Address',
                        'UDP Destination Port',
                        'UDP Protocol',
                        'UDP Data Length'
                    ];
                    $filenames = [
                        'udp_Timestamp',
                        'udp_Src_macAdd',
                        'udp_Desti_macAdd',
                        'udp_Ethertype',
                        'udp_packetlength',
                        'udp_SrcIP_add',
                        'udp_Srcport',
                        'udp_DestiIP_add',
                        'udp_Destiport',
                        'udp_Protocol',
                        'udp_DataLength'
                    ];
                    break;
                default:
                    echo '<tr><td>No data found for selected option.</td></tr>';
                    exit;
            }
            break;
        default:
            echo '<tr><td>No data found for selected protocol.</td></tr>';
            exit;
    }

    // Output the HTML structure with the table
    echo '<!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Packet Information</title>
                <style>
                    body {
                        font-family: Arial, sans-serif;
                        margin: 20px;
                    }
                    table {
                        width: 100%;
                        border-collapse: collapse;
                        margin-top: 20px;
                    }
                    th, td {
                        padding: 10px;
                        text-align: left;
                        border-bottom: 1px solid #ddd;
                        white-space: pre-wrap; /* Ensures line breaks are preserved */
                    }
                    th {
                        background-color: #0096FF; /* Set the background color of headers to blue */
                        color: white; /* Set the text color to white for better contrast */
                    }
                </style>
            </head>
            <body>
                <table>
                    <tr>';

    // Output the table headers based on data types
    foreach ($dataTypes as $dataType) {
        echo "<th>{$dataType}</th>";
    }

    echo '</tr>';

    // Output the table rows with respective data
    echo '<tr>';
    foreach ($filenames as $filename) {
        $data = fetchDataFromFile($filename);
        echo "<td>{$data}</td>";
    }
    echo '</tr>';

    // Close the HTML structure
    echo '</table>
        </body>
        </html>';

} else {
    echo 'Please select both a protocol and a data type.';
}
?>

