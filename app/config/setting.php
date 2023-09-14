<?php
use App\Core\Database;
use App\Core\Router;

?>
<div class="" x-data="vigilio()">
    <div class="modal-vigilio" :class="onModal || 'hidde'" @click.outside="onClose">
        <span class="title">Vigilio</span>
        <div x-data="{onDropdown:false}" @click.outside="onDropdown=false">
            <div class="container" @click="onDropdown=!onDropdown">
                <span class="subtitle">Router</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                </svg>
            </div>
            <div class="container-hidden" :class="onDropdown || 'hidde' ">
                <table>
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>URL</th>
                            <th>METHOD</th>
                            <th>NAME</th>
                            <th>CONTROLLER</th>
                            <th>EXIST</th>
                        </tr>

                    </thead>
                    <tbody>
                        <?php
                         $i =0;
                         foreach(Router::routers() as $method =>$route):
                            foreach($route as $key =>$value):
                                $key = "/{$key}";
                                $isController= is_callable($value[0]) ? "callback":"{$value[0]}.{$value[1]}";
                                $url = str_contains($key,":") ? $key: "<a href='{$key}'>{$key}</a>";
                                $uknownName=$value['NAME'] ?? "UNKNOWN";
                                $existMethod =method_exists($value[0] ,$value[1]??'') ? "#138535" : "#FF0000";
                                $existMethod =is_callable($value[0]) ? "#BF5B16":$existMethod;
                                $i++;
                        ?>
                        <tr>
                            <td><?= $i?></td>
                            <td><?=$url?></td>
                            <td><?=$method ?></td>
                            <td><?= $uknownName?></td>
                            <td><?=$isController?></td>
                            <td>
                                <div
                                    style='width:20px;height:20px;background-color:<?=$existMethod?>;border-radius:100%;display:block;margin:0 auto'>
                                </div>
                            </td>
                        </tr>
                        <?php
                            endforeach;
                                endforeach; 
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
        <div x-data="{onDropdown:false}" @click.outside="onDropdown=false">
            <div class="container" @click="onDropdown=!onDropdown">
                <span class="subtitle">Migrations</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                </svg>
            </div>
            <div class="container-hidden" :class="onDropdown || 'hidde' ">
                <table>
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>MIGRATION</th>
                            <th>CREATED</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $migrations = new Database();
                            $result = $migrations->getMigrations();
                            $i =0;
                            foreach($result as $value):
                            $i++;
                        ?>
                        <tr>
                            <td><?= $i?></td>
                            <td><?=$value['migration']?></td>
                            <td><?=$value['created_at'] ?></td>
                        </tr>
                        <?php
                        endforeach;
                        ?>
                    </tbody>
                </table>
                <table>
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>TABLE</th>
                            <th>ROWS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i =0;
                            foreach($migrations->getTables() as $value):
                            $i++;
                            $dbTable=$value['Tables_in_'.strtolower($_ENV['DB_NAME'])];
                            $count =$migrations->count($dbTable)["count"];
                        ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $dbTable; ?></td>
                            <td><?=  $count; ?></td>
                        </tr>
                        <?php
                        endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <button type="button" @click="$e=>{$e.stopPropagation();onOpenClose()}" class="button-principal">
        Vigilio
    </button>
    <style>
    .button-principal {
        position: fixed;
        bottom: 2rem;
        right: 2rem;
        background-color: rgba(0, 0, 0, 0.7);
        padding: .5rem 2rem;
        border-radius: 1rem;
        color: white;
        font-weight: bold;
    }

    .modal-vigilio {
        position: fixed;
        background-color: rgba(0, 0, 0, 0.8);
        bottom: 6rem;
        right: 4rem;
        border-radius: .5rem;
        padding: 1rem;
        width: 500px;

    }


    .modal-vigilio svg {
        width: 1.5rem;
    }

    .modal-vigilio .title {
        color: white;
        font-size: 2rem;
        font-weight: bolder;
        text-transform: uppercase;
        display: block;
        text-align: center;
    }

    .modal-vigilio .subtitle {
        color: white;
        font-size: 1.2rem;
        font-weight: bolder;
        text-transform: uppercase;
        display: block;
        text-align: center;
    }

    .modal-vigilio .container {
        display: flex;
        justify-content: space-between;
        border-bottom: 2px solid white;
        padding: 1rem 0;

    }

    .modal-vigilio .container svg {
        color: white;
    }

    .container::-webkit-scrollbar-thumb {
        background: #ccc;
        border-radius: 4px;
    }

    .modal-vigilio ::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        border-radius: 10px;
        background-color: white;
    }

    .modal-vigilio ::-webkit-scrollbar {
        width: 6px;
        background-color: black;
    }

    .modal-vigilio ::-webkit-scrollbar-thumb {
        height: 2px;
        background-color: black;
    }


    .modal-vigilio .container-hidden {
        padding: 1rem;
        max-height: 280px;
        overflow: auto;
        display: flex;
        flex-direction: column;
        gap: 2rem;
    }

    .hidde {
        display: none !important;

    }

    .modal-vigilio table {
        border-collapse: collapse;
        width: 100%;
        border-radius: .3rem;
        overflow: hidden;

    }

    .modal-vigilio th,
    .modal-vigilio td {
        text-align: left;
        padding: 8px;
        color: white;
    }

    .modal-vigilio tr:nth-child(even) {
        background-color: #1A1A1A;
        color: white;

    }

    .modal-vigilio th {
        background-color: #04AA6D;
        color: white;
    }
    </style>
    <script>
    function vigilio() {
        return {
            onModal: false,
            onOpen() {
                this.onModal = true;
            },
            onClose() {
                this.onModal = false;
            },
            onOpenClose() {
                this.onModal = !this.onModal
            },

        }
    }
    </script>
</div>