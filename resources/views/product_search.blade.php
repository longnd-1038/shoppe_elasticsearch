<!DOCTYPE html>
<head lang="en">
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <meta name="author" value="vanGato">
        <style>
            /* ------- COLORS ------- */

            :root {

                /* ALL */
                --color: #ff0030; /* red   */
                --background-color: white; /* white */
                --text-color: black; /* black */
                --text-light-color: #444; /* dark  */
                --border-color: silver; /* grey  */

                /* SERP only */
                --link-color: #2619AF; /* blau  */
                --link-visited-color: #670199; /* lila  */
                --url-color: #078307; /* green */
                --header-color: #f53d2d; /* grey  */
                --ad-color: #58a33f; /* green */

            }

            /* ------- CSS only for the SERP Page ------- */

            body {
                color: var(--text-color);
                font-family: Helvetica Neue, Arial, sans-serif;
                font-size: 17px;
                line-height: normal;
                margin: 0;
            }

            .serp {
                min-height: 100%;
                position: relative;
                width: 100%;
            }

            .serp__layout {
                border-bottom: 1px solid var(--border-color);
            }

            .serp__body {
                display: block;
            }

            @media (min-width: 600px) {
                .serp__body {
                    margin-top: 14px;
                    max-width: 820px;
                }
            }

            @media (min-width: 990px) {
                .serp__body {
                    display: flex;
                    margin-left: 90px;
                    max-width: 1040px;
                }
            }

            .serp__main {
                max-width: 100%;
            }

            @media (min-width: 600px) {
                .serp__main {
                    padding: 0 17px;
                }
            }

            @media (min-width: 990px) {
                .serp__main {
                    flex: 66%;
                    max-width: 66%;
                }
            }

            .serp__sidebar {
                display: none;
                padding: 0 16px 0 0;
            }

            @media (min-width: 990px) {
                .serp__sidebar {
                    display: block;
                    flex: 34%;
                    max-width: 34%;
                }
            }

            .serp__footer {
                margin: 30px 0 0;
                width: 100%;
            }

            .serp__header {
                background-color: var(--header-color);
                display: flex;
                flex-wrap: wrap;
                min-height: 60px;
                padding: 10px 10px 0;
                margin: 0;
            }

            @media (min-width: 800px) {
                .serp__header {
                    align-items: center;
                    min-height: 70px;
                }
            }

            .serp__header > div {
                flex: 1;
            }

            @media (min-width: 600px) {
                .serp__header .serp__search {
                    order: 2;
                    margin-left: 11px;
                }
            }

            @media (min-width: 990px) {
                .serp__header .serp__search {
                    margin-left: 31px;
                }
            }

            .serp__logo {
                background-image: url("https://raw.githubusercontent.com/vanGato/search-engine-template/master/img/se.png");
                background-position: 50% 50%;
                background-repeat: no-repeat;
                background-size: contain;
                display: block;
                flex: 0 0 40px;
                height: 40px;
                margin: 0 0 0 10px;
            }

            @media (min-width: 600px) {
                .serp__logo {
                    order: 1;
                }
            }

            .serp__header .serp__nav {
                flex: 100%;
            }

            @media (min-width: 600px) {
                .serp__header .serp__nav {
                    order: 3;
                    margin-left: 17px;
                }
            }

            @media (min-width: 990px) {
                .serp__header .serp__nav {
                    margin-left: 98px;
                }
            }

            .serp__form {
                background-color: var(--background-color);
                border-radius: 2px;
                border: 1px solid var(--border-color);
                box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
                display: flex;
            }

            @media (min-width: 800px) {
                .serp__form {
                    max-width: 680px;
                    width: 100%;
                }
            }

            .serp__form > div {
                flex: 1;
            }

            .serp__query {
                background: transparent;
                color: var(--text-light-color);
                display: block;
                font-size: 16px;
                margin: 0;
                outline: none;
                padding: 5px 10px 5px 15px;
                width: 100%;
                -webkit-appearance: none;
            }

            .serp__button,
            .serp__query {
                font-weight: bold;
                border: 0;
                height: 38px;
                line-height: 38px;
            }

            .serp__button {
                background-color: transparent;
                cursor: pointer;
                flex: 0 0 40px;
                font-weight: 500;
                padding: 0;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
            }

            .serp__button .serp__ico {
                background-color: pink;
                background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg height='17' width='17' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M6.87 11.67c-2.565 0-4.644-2.107-4.644-4.706 0-2.6 2.079-4.707 4.643-4.707 2.564 0 4.643 2.107 4.643 4.707 0 2.6-2.079 4.706-4.643 4.706m9.728 2.953l-3.908-3.962a6.998 6.998 0 0 0 1.05-3.698C13.738 3.117 10.662 0 6.868 0S0 3.117 0 6.963s3.075 6.963 6.87 6.963c1.458 0 2.81-.462 3.923-1.248l3.861 3.915a1.36 1.36 0 0 0 1.944 0 1.407 1.407 0 0 0 0-1.97' fill='%234f5f8f'/%3E%3C/svg%3E");
                background-size: 20px 20px;
                background-position: 50% 50%;
                background-repeat: no-repeat;
                height: 38px;
                width: 40px;
            }

            :focus,
            :active {
                outline: 0 none;
            }

            .serp__nav {
                color: var(--text-light-color);
                display: flex;
                font-size: 14px;
                justify-content: space-around;
                line-height: 1;
                list-style: none;
                margin: 0;
                padding: 0;
            }

            @media (min-width: 600px) {
                .serp__nav {
                    justify-content: flex-start;
                    justify-content: start;
                }
            }

            .serp__nav li {
                margin-left: 1em;
            }

            .serp__nav li:first-child {
                margin-left: 0;
            }

            @media (min-width: 600px) {
                .serp__nav li {
                    margin-left: 3em;
                }
            }

            .serp__nav a {
                color: inherit;
                display: block;
                padding: 12px 0 8px;
                text-decoration: none;
            }

            .serp__nav .serp__active {
                border-bottom: 3px solid var(--color);
                color: var(--text-color);
                font-weight: 700;
            }

            .serp__results {
                background: var(--border-color);
                padding: 5px 0 5px 0;
            }

            @media (min-width: 600px) {
                .serp__results {
                    background-color: var(--background-color);
                    padding: 5px 2em 0 0;
                }
            }

            .serp__results > div {
                background-color: var(--background-color);
                box-shadow: 0 2px 1px rgba(0, 0, 0, .1), 0 0 1px rgba(0, 0, 0, .1);
                margin: 5px 10px;
                padding: 5px 8px;
            }

            @media (min-width: 600px) {
                .serp__results > div {
                    box-shadow: none;
                    padding: 0;
                }
            }

            @media (min-width: 990px) {
                .serp__results > div {
                    margin: 5px 0;
                }
            }

            .serp__ad {
                display: inline-block;
                border-radius: 3px;
                border: 1px solid var(--ad-color);
                color: var(--ad-color);
                font-size: 13px;
                line-height: 13px;
                margin-right: 7px;
                padding: 0 3px 0 2px;
                vertical-align: baseline;
            }

            .serp__web {
                background-color: inherit;
                font-size: 14px;
            }

            .serp__label {
                color: #666;
                font-size: 12px;
                font-weight: 400;
                margin: 1em 0;
            }

            @media (min-width: 600px) {
                .serp__label {
                    display: none;
                }
            }

            .serp__result {
                margin: 0;
                padding: 8px 0;
            }

            .serp__result a {
                text-decoration: none;
            }

            .serp__title {
                color: black;
                font-size: 18px;
                font-weight: 700;
                line-height: 1.4;
            }

            a .serp__title:hover {
                text-decoration: underline;
            }

            .serp__url {
                color: var(--url-color);
                font-size: 16px;
                word-break: break-all;
                line-height: 1.4;
                overflow: ellipsis;
            }

            .serp__result a:hover span:nth-child(1),
            .serp__result a:hover div:nth-child(1) {
                text-decoration: underline;
            }

            .serp__video {
                float: left;
                margin: 7px 10px 0 0;
            }

            .serp__video .serp__thumbnail {
                align-items: center;
                background: #000;
                display: flex;
                height: 65px;
                justify-content: center;
                position: relative;
                width: 116px;
                border: 1px solid var(--border-color);
            }

            .serp__video .serp__thumbnail img {
                display: block;
                height: auto;
                max-height: 65;
                max-width: 116px;
                width: auto;
            }

            .serp__video .serp__thumbnail .serp__duration {
                background-color: rgba(0, 0, 0, .7);
                color: #fff;
                font-size: 11px;
                font-weight: 700;
                padding: 1px 3px;
                position: absolute;
                bottom: 1px;
                left: auto;
                right: 1px;
            }

            @media (max-width: 600px) {
                .serp__hide-on-mobile {
                    display: none;
                }

                .serp__result {
                    min-height: 65px;
                }
            }

            .serp__zoom {
                top: 0;
                left: 0;
                margin: 0;
                display: block;
                width: 100%;
                height: 100%;
                position: relative;
                overflow: hidden;
            }

            .serp__zoom img {
                -webkit-transform: scale(1.04);
                -ms-transform: scale(1.04);
                transform: scale(1.04);
                transition: all 1s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            }

            .serp__zoom img:hover {
                -webkit-transform: scale(1.21);
                -ms-transform: scale(1.21);
                transform: scale(1.21);
            }

            .serp__description {
                color: var(--text-color);
                line-height: normal;
            }

            .serp__match {
                color: var(--color);
                font-weight: bold;
            }

            .serp__sticky {
                background-color: var(--background-color);
                display: block;
                line-height: 1.4;
                padding: 0;
                position: -webkit-sticky;
                position: sticky;
                top: 20px;
            }

            .serp__headline {
                color: var(--text-light-color);
                font-size: 12px;
                font-weight: 400;
                margin: 20px 0 8px;
            }

            .serp__hint {
                color: var(--text-color);
                margin: 0;
                padding: 4px 0;
                font-size: 18px;
                height: 28px;
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: nowrap;
                width: 100%;
            }

            .serp__related {
                color: var(--link-color);
                text-decoration: none;
            }

            .serp__wiki {
                max-width: 220px;
            }

            .serp__wiki h2 {
                font-size: 18px;
                font-weight: 700;
                line-height: 1.4;
                color: var(--text-light-color);
                padding: 0;
                margin: 10px 0;
            }

            .serp__wiki p {
                margin: 0;
                color: var(--text-color);
                padding: 0;
                font-size: 14px;
            }

            .serp__wiki ul li {
                color: var(--text-light-color);
                padding: 0;
            }

            .serp__wiki .hint {
                color: var(--color);
            }

            .serp__wiki img {
                margin: 10px 0 5px 0;
                max-height: 200px;
                max-width: 200px;
            }

            .serp__wiki p small {
                font-size: x-small;
            }

            .serp__wiki a {
                color: var(--link-color);
            }

            .serp__wiki a:link {
                color: var(--link-color);
            }

            .serp__wiki a:hover {
                text-decoration: none;
            }

            .serp__wiki a:active {
                color: var(--link-visited-color);
            }

            .serp__wiki a:visited {
                color: var(--link-visited-color);
            }

            .serp__wiki a:focus {
                outline: 0;
            }

            .serp__bottom {
                color: var(--text-light-color);
                display: flex;
                flex-wrap: wrap;
                font-size: 13px;
                justify-content: center;
                padding: 2em 0;
                text-align: center;
                width: 100%;
            }

            @media (min-width: 400px) {
                .serp__bottom {
                    font-size: 13px;
                }
            }

            @media (min-width: 600px) {
                .serp__bottom {
                    flex-wrap: nowrap;
                }
            }

            .serp__copyright {
                flex: 100%;
                margin: 1em 0 0;
            }

            @media (min-width: 600px) {
                .serp__copyright {
                    border-right: 1px solid var(--border-color);
                    display: inline-flex;
                    flex: none;
                    margin: 0 2em 0 0;
                    padding-right: 2em;
                }
            }

            .serp__links {
                display: flex;
                justify-content: space-around;
                list-style: none;
                margin: 0;
                padding: 0;
            }

            @media (min-width: 600px) {
                .serp__links {
                    display: inline-flex;
                    flex: none;
                    order: 2;
                }
            }

            .serp__links li {
                margin-left: .5em;
                padding-left: 1em;
                position: relative;
            }

            .serp__links li:before {
                content: "•";
                position: absolute;
                left: 0;
            }

            .serp__links li:first-child {
                margin-left: 0;
                padding-left: 0;
            }

            .serp__links li:first-child:before {
                content: "";
            }

            @media (min-width: 400px) {
                .serp__links li {
                    margin-left: 1em;
                    padding-left: 1.2em;
                }
            }

            .serp__links a {
                color: inherit;
                text-decoration: none;
            }

            .serp__no-results {
                /* NOT USED */
            }

            /* ------- PAGINATION ------- */

            .serp__pagination {
                /* border: 1px solid green; /* DEV ONLY */
                margin-top: 40px;
                justify-content: flex-start;
                text-align: center;
            }

            .serp__pagination ul,
            .serp__pagination ul li {
                list-style: none;
                display: inline;
                padding-left: 4px;
            }

            .serp__pagination li {
                counter-increment: pagination;
            }

            .serp__pagination li:hover a {
                color: var(--background-color);
                background-color: var(--color);
                border: solid 1px var(--text-light-color);
            }

            .serp__pagination li.serp__pagination-active a {
                color: var(--background-color);
                background-color: var(--color);
                border: solid 1px var(--text-light-color);
            }

            .serp__pagination li:first-child a:after {
                content: "◄";
                line-height: 17px;
                font-size: 17px;
            }

            .serp__pagination li:nth-child(2) {
                counter-reset: pagination; /* DONT USE IF .serp__short-pagi IS USED */
            }

            .serp__pagination li:last-child a:after {
                content: "►";
                line-height: 17px;
                font-size: 17px;
            }

            .serp__pagination li a {
                border: solid 1px var(--border-color);
                border-radius: 0.2rem;
                color: var(--text-color);
                text-decoration: none;
                text-transform: uppercase;
                display: inline-block;
                text-align: center;
                padding: 0.5rem 0.9rem;
                margin-top: 8px;
            }

            .serp__pagination li a:after {
                content: " " counter(pagination) " ";
            }

            /* OPTIONAL */

            .serp__short-pagi li a {
                display: none;
            }

            .serp__short-pagi li:first-child a {
                display: inline-block;
            }

            .serp__short-pagi li:first-child a:after {
                content: "<";
            }

            .serp__short-pagi li:last-child a {
                display: inline-block;
            }

            .serp__short-pagi li:last-child a:after {
                content: ">";
            }

            .serp__short-pagi li:nth-child(2) a {
                display: inline-block;
            }

            .serp__short-pagi li:nth-child(3) a {
                display: inline-block;
            }

            .serp__short-pagi li:nth-child(4) a {
                display: inline-block;
            }

            .serp__short-pagi li:nth-child(5) a {
                display: inline-block;
            }

            .serp__short-pagi li:nth-last-child(2) a {
                display: inline-block;
            }

            .serp__short-pagi li:nth-last-child(3) {
                display: inline-block;
            }

            .serp__short-pagi li:nth-last-child(3):after {
                padding: 0 1rem;
                content: "...";
            }

            @media (max-width: 600px) {
                .serp__pagination li:first-child a,
                .serp__pagination li:last-child a {
                    align-items: center;
                    background: var(--text-light-color);
                    color: var(--background-color);
                    table-layout: fixed;
                    display: table-cell;
                    font-size: 16px;
                    font-weight: 700;
                    height: 3em;
                    line-height: 3em;
                    justify-content: center;
                    text-decoration: none;
                    text-transform: uppercase;
                    width: 39%;
                }

                .serp__pagination li a {
                    display: none;
                }
            }

            .serp__disabled {
                opacity: .25;
                /*cursor: default;*/
                cursor: not-allowed;
            }

            /* ------- EOF ------- */

            /* Pure CSS MODAL */

            .modal__close {
                color: var(--text-light-color);
                font-size: 30px;
                text-decoration: none;
                position: absolute;
                right: 5px;
                top: 0;
            }

            .modal__close:hover {
                color: var(--text-color);
            }

            .modal:before {
                content: "";
                display: none;
                background: rgba(0, 0, 0, 0.6);
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                z-index: 10;
            }

            .modal:target:before {
                display: block;
            }

            .modal:target .modal__dialog {
                -webkit-transform: translate(0, 0);
                -ms-transform: translate(0, 0);
                transform: translate(0, 0);
                top: 20%;
            }

            .modal__dialog {
                margin-left: -150px;
                width: 280px;
                background: var(--background-color);
                border: 1px solid var(--border-color);
                border-radius: 5px;
                position: fixed;
                left: 50%;
                top: -100%;
                z-index: 11;
                -webkit-transform: translate(0, -500%);
                -ms-transform: translate(0, -500%);
                transform: translate(0, -500%);
                -webkit-transition: -webkit-transform 0.3s ease-out;
                -moz-transition: -moz-transform 0.3s ease-out;
                -o-transition: -o-transform 0.3s ease-out;
                transition: transform 0.3s ease-out;
            }

            @media (min-width: 769px) {
                .modal__dialog {
                    margin-left: -400px;
                    width: 800px;
                }
            }

            .modal__body {
                padding: 10px 20px;
                height: 200px;
                max-height: 200px;
                overflow-y: scroll;
            }

            .modal__header,
            .modal__footer {
                padding: 10px 20px;
            }

            .modal__header {
                border-bottom: 1px solid var(--border-color);
            }

            .modal__header h2 {
                font-size: 20px;
            }

            .modal__footer {
                border-top: 1px solid var(--border-color);
                text-align: right;
                font-size: x-small;
            }


            .inputDnD {

            .form-control-file {
                position: relative;
                width: 100%;
                height: 100%;
                min-height: 6em;
                outline: none;
                visibility: hidden;
                cursor: pointer;
                background-color: #c61c23;
                box-shadow: 0 0 5px solid currentColor;

            &
            :before {
                content: attr(data-title);
                position: absolute;
                top: 0.5em;
                left: 0;
                width: 100%;
                min-height: 6em;
                line-height: 2em;
                padding-top: 1.5em;
                opacity: 1;
                visibility: visible;
                text-align: center;
                border: 0.25em dashed currentColor;
                transition: all 0.3s cubic-bezier(.25, .8, .25, 1);
                overflow: hidden;
            }

            &
            :hover {

            &
            :before {
                border-style: solid;
                box-shadow: inset 0px 0px 0px 0.25em currentColor;
            }

            }
            }
            }

            /
            /
            PRESENTATIONAL CSS
            body {
                background-color: #f7f7f9;
            }

            #loading {
                background-color: white;
                position: fixed;
                display: block;
                top: 0;
                bottom: 0;
                z-index: 1000000;
                opacity: 0.5;
                width: 100%;
                height: 100%;
                text-align: center;
            }

            .loading_spin {
                background-color: white;
                position: fixed;
                display: block;
                top: 0;
                bottom: 0;
                z-index: 1000000;
                opacity: 0.5;
                width: 100%;
                height: 100%;
                text-align: center;

            }

            #loading img {
                margin: auto;
                display: block;
                top: calc(50% - 100px);
                left: calc(50% - 10px);
                position: absolute;
                z-index: 999999;
            }

            /* ------- EOF ------- */

            }
            .card-header {
                height: 120px;
            }

            .modal-header {
                background-color: #f7f7f7;
            }

            @media (min-width: 768px) {
                /* show 4 items */
                .carousel-inner .active,
                .carousel-inner .active + .carousel-item,
                .carousel-inner .active + .carousel-item + .carousel-item,
                .carousel-inner .active + .carousel-item + .carousel-item + .carousel-item {
                    display: block;
                }

                .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left),
                .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left) + .carousel-item,
                .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left) + .carousel-item + .carousel-item,
                .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left) + .carousel-item + .carousel-item + .carousel-item {
                    transition: none;
                }

                .carousel-inner .carousel-item-next,
                .carousel-inner .carousel-item-prev {
                    position: relative;
                    transform: translate3d(0, 0, 0);
                }

                .carousel-inner .active.carousel-item + .carousel-item + .carousel-item + .carousel-item + .carousel-item {
                    position: absolute;
                    top: 0;
                    right: -25%;
                    z-index: -1;
                    display: block;
                    visibility: visible;
                }

                /* left or forward direction */
                .active.carousel-item-left + .carousel-item-next.carousel-item-left,
                .carousel-item-next.carousel-item-left + .carousel-item,
                .carousel-item-next.carousel-item-left + .carousel-item + .carousel-item,
                .carousel-item-next.carousel-item-left + .carousel-item + .carousel-item + .carousel-item,
                .carousel-item-next.carousel-item-left + .carousel-item + .carousel-item + .carousel-item + .carousel-item {
                    position: relative;
                    transform: translate3d(-100%, 0, 0);
                    visibility: visible;
                }

                /* farthest right hidden item must be absolue position for animations */
                .carousel-inner .carousel-item-prev.carousel-item-right {
                    position: absolute;
                    top: 0;
                    left: 0;
                    z-index: -1;
                    display: block;
                    visibility: visible;
                }

                /* right or prev direction */
                .active.carousel-item-right + .carousel-item-prev.carousel-item-right,
                .carousel-item-prev.carousel-item-right + .carousel-item,
                .carousel-item-prev.carousel-item-right + .carousel-item + .carousel-item,
                .carousel-item-prev.carousel-item-right + .carousel-item + .carousel-item + .carousel-item,
                .carousel-item-prev.carousel-item-right + .carousel-item + .carousel-item + .carousel-item + .carousel-item {
                    position: relative;
                    transform: translate3d(100%, 0, 0);
                    visibility: visible;
                    display: block;
                    visibility: visible;
                }
            }


            .pagination-page-info {
                padding: .6em;
                padding-left: 0;
                width: 40em;
                margin: .5em;
                margin-left: 0;
                font-size: 12px;
            }

            .pagination-page-info b {
                color: black;
                background: #6aa6ed;
                padding-left: 2px;
                padding: .1em .25em;
                font-size: 150%;
            }

            .card.border-primary.mb-3 {
                box-shadow: 8px -4px 1px #00b5ff;
            }

            a.card-header.document_name {
                height: 8em;
                font-weight: bold;
                color: black;
            }

            .js-btn-result a.badge.badge-primary {
                font-size: revert;
                font-weight: bold;
            }

            .spinner-grow {
                margin-top: 350px;
            }

            .card-body.text-primary img {
                width: 170px;
            }

        </style>
    </head>
<body>


<!-- The Modal show topic -->
<div class="modal fade bd-example-modal-xl" id="modal_show_topic">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title title_topic"></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div id="content_item_topic" class="row ">


                    </div>
                    <div class="row">
                        <div class="col text-center">
                            <button id="load_more_related1" class="btn btn-warning">Xem Thêm
                            </button>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>


<!-- The Modal Suggest -->
<div class="modal fade bd-example-modal-xl" id="modal_hide_infor">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title title-suggest" style="color: red"></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <label>Description: </label>
                    <div id="content_pdf" class="row mb-5">

                    </div>

                    <h3>Gợi ý sản phẩm liên quan đến : </h3>
                    <h4 style="color:red" class="product-name-suggest"></h4>
                    <div id="related" class="row ">

                    </div>
                    <div class="row">
                        <div class="col text-center">
                            <button id="load_more_related" class="btn btn-warning">
                                Xem thêm
                            </button>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

<div id="loading" style="display:none" class="text-center">
    <div class="spinner-grow text-primary" role="status">
        <span class="sr-only">Loading...</span>
    </div>
    <div class="spinner-grow text-secondary" role="status">
        <span class="sr-only">Loading...</span>
    </div>
    <div class="spinner-grow text-success" role="status">
        <span class="sr-only">Loading...</span>
    </div>
    <div class="spinner-grow text-danger" role="status">
        <span class="sr-only">Loading...</span>
    </div>
    <div class="spinner-grow text-warning" role="status">
        <span class="sr-only">Loading...</span>
    </div>
    <div class="spinner-grow text-info" role="status">
        <span class="sr-only">Loading...</span>
    </div>
    <div class="spinner-grow text-light" role="status">
        <span class="sr-only">Loading...</span>
    </div>
    <div class="spinner-grow text-dark" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>

<div class="serp">
    <div class="serp__layout">
        <div class="serp__header">
            <div class="serp__search">
                <form class="serp__form" method="GET">
                    <div>
                        <input name="search" id="search" type="search" required="true"
                               value="{!! $searchvalue !!}"
                               class="serp__query"
                               autocomplete="off"
                               title="Search"
                               aria-label="Search"
                               dir="ltr"
                               spellcheck="false"
                               autofocus="autofocus"
                        >
                    </div>
                    <button class="serp__button" aria-label="Search" type="submit">
                        <div class="serp__ico"></div>
                    </button>
            </div>
            <a class="serp__logo" href="/elastic"></a>
            <ul class="serp__nav">
                <li class="serp__active"><a>Tìm kiếm theo tên sản phẩm <input type="checkbox" name="search-name"
                                                                              id="search-name"
                                                                              value="1" {{ isset($paramsearch['search-name']) ? 'checked' : ''}}/></a>
                </li>
                <li class="serp__active"><a>Tìm kiếm theo theo mô tả <input type="checkbox" name="search-description"
                                                                            id="search-description"
                                                                            value="1" {{ isset($paramsearch['search-description']) ? 'checked' : ''}} /></a>
                </li>
                @php
                    if (!$paramsearch) {
                          $paramsearch['price'] = 'all';
                        }
                @endphp
                <li class="serp__active"><a>Lọc giá
                        <select id="price" name="price">
                            <option {{ $paramsearch['price'] == 'all' ? 'selected' : ''}} value="all">Tất cả</option>
                            <option {{ $paramsearch['price'] == '0-50000' ? 'selected' : ''}} value="0-50000">Dưới
                                50.000
                            </option>
                            <option {{ $paramsearch['price'] == '50000-100000' ? 'selected' : ''}} value="50000-100000">
                                50.000 - 100.000
                            </option>
                            <option
                                {{ $paramsearch['price'] == '100000-1000000000' ? 'selected' : ''}} value="100000-1000000000">
                                Trên - 100.000
                            </option>
                        </select>
                    </a>
                </li>
            </ul>

        </div>
        </form>
    </div>
    <div class="serp__body">
        <div class="serp__main serp__results">

            <div class="serp__web">
                <span class="serp__label">Web Results</span>

                {{--                {% for key, value in result.items() %}--}}
                @foreach($items as $item)
                    @php
                        $descs = "";
                        if (isset($item['highlight']['description'])) {
                        foreach ($item['highlight']['description'] as $desc) {
                                    $descs = $desc . " ";
                                }
                        } else {
                            $descs = $item['_source']['description'];
                        }
                        $name = "";
                         if (isset($item['highlight']['name'])) {
                             $name = $item['highlight']['name'][0];
                         } else {
                             $name = $item['_source']['name'];
                         }

                    @endphp
                    <div data-id="1" class="serp__result">
                        <a href="" target="_blank">
                            <div data-id="" class="serp__title">{!! $name  !!}
                                <h4 class="float-right"><span
                                        class="badge badge-danger">{{ number_format($item['_source']['price'], 0, '', '.') }}đ</span>
                                </h4>
                            </div>
                            <h3 class="badge badge-success">{{ $item['_source']['branch'] }}</h3>
                            <div class="serp__url"> {{ $item['_source']['make_by'] }} </div>
                        </a>

                        <span class="serp__description">{!! $descs !!}  <a style="color: black; font-size: 14px "
                                                                           class="serp__title"
                                                                           data-id=""
                                                                           href="#">...Xem Thêm</a></span>
                    </div>
                @endforeach

            </div>
            <div class="serp__no-results">
                <p><strong>No search results were found for &raquo;&laquo;</strong></p>
                <p>Đề nghị:</p>
                <ul>
                    <li>Kiểm tra lỗi chính tả.</li>
                    <li>Thử tìm kiếm một số từ liên quan khác.</li>
                    <li>Mô tả thông tin dài hơn.</li>
                </ul>
            </div>
            <div class="serp__pagination">
                <ul>
                    <li><a class="serp__disabled"></a></li>
                    <li><a href=""></a></li>
                    <li><a href=""></a></li>
                </ul>
            </div>

        </div>
        <div class="serp__sidebar">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                Mô tả sản phẩm
            </button>

            <!-- The Modal -->
            <div class="modal fade bd-example-modal-xl" id="myModal">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Tìm kiếm tài liệu bằng File</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="container">

                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- Modal body -->
                                        <b>Input text : </b>
                                        <br>
                                        <br>
                                        <textarea id="doc_text" class="doc_text" name="doc_text"
                                                  required
                                                  placeholder="Document Text"
                                                  rows="4" cols="50"
                                        > </textarea>

                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                    </div>
                                    <div class="col-sm-6">
                                        <br>
                                        <br>
                                        <button type="button" class="btn btn-primary btn-block"
                                                onclick="document.getElementById('inputFile').click()">Add File
                                        </button>
                                        <div class="form-group inputDnD">
                                            <label class="sr-only" for="inputFile">File Upload</label>
                                            <form id="upload-file" method="post" enctype="multipart/form-data">
                                                <input type="file"
                                                       name="inputFile"
                                                       class="form-control-file text-primary font-weight-bold"
                                                       id="inputFile"
                                                       data-title="Drag and drop a file">
                                                <br>
                                                <button class="btn btn-success btn_classify">
                                                    Find Document
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="row js-btn-result">


                                </div>
                            </div>
                        </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>

                    </div>
                </div>
            </div>

            <div class="serp__sticky">

                <div class="serp__headline">Elastic Search</div>
                <div class="serp__wiki">
                    <h2> Search Engine Implement Elastic Search</h2>
                    <img src="https://shopee.vn/blog/wp-content/uploads/2019/03/Shopee-logo-512x512.png"/>

                </div>
                <div class="serp__headline">Tìm kiếm Sản phẩm Shoppe&raquo;&laquo;</div>
                <div class="serp__hint">
                    <a class="serp__related">
                        <b>Sản phẩm Shoppe</b> <span class="badge badge-success"></span>
                    </a><br>
                </div>
                <div class="topics">

                </div>

            </div>
        </div>
    </div>
    <div class="serp__footer">
        <div class="serp__bottom">
            <ul class="serp__links">
                <li><a href="#about">Về chúng tôi</a></li>
                <li><a href="#about">Bảo mật</a></li>
                <li><a href="#about">Điều khoản</a></li>
                <li><a href="#about">Liên hệ</a></li>
            </ul>
            <p class="serp__copyright">&copy; 2020 dinhlongit1998@gmail.com</p>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal" id="about" aria-hidden="true">
    <div class="modal__dialog">
        <div class="modal__header">
            <h2>Về chúng tôi</h2>
            <a href="#" class="modal__close" aria-hidden="true">×</a>
        </div>
        <div class="modal__body">
            <p>Da Nang University</p>
        </div>
        <div class="modal__footer">
            <p>Last Update 01.01.2020</p>
        </div>
    </div>
</div>
<!-- /Modal -->
<script type=text/javascript>
    $(function () {
        $('.serp__title').click(function (e) {
            e.preventDefault();
            let productId = $(this).data('id');
            $.get('http://127.0.0.1:9200/shoppe/product/' + productId, function (data) {
            //$.get('http://timtailieu.online:9200/shoppe/product/' + productId, function (data) {
                let fullText = data._source.name + " " + data._source.description + " " + data._source.branch + " " + data._source.make_by;
                suggestProduct(fullText, data._source.name, data._source.description);
            });

        })
    });

    function suggestProduct(fullText, name, description) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "POST",
            cache: false,
            url: "/elastic/suggest",
            data: {suggest: fullText},
            success: function (data) {
                $('#modal_hide_infor').modal('show');
                $('.title-suggest').text(name);
                $('#content_pdf').text(description);
                $('.product-name-suggest').text(name);
                let suggestProduct = "";
                data.forEach(function (product, index) {

                    suggestProduct +=
                        '<div class="card col-md-4">' +
                        '    <div class="card-body">' +
                        '        <h5 class="card-title" style="color: blue">' + product.name + '</h5>' +
                        '        <span class="card-text">' + product.description.split(' ').splice(0, 40).join(" ") + "..." + '</span>' +
                        '        <p class="card-text"><small style="color: green" class"text-muted">' + product.branch + '</small></p>' +
                        '    </div>' +
                        '</div>'
                });
                $('#related').html(suggestProduct)
            },
            error: function (error) {
                //Code của bạn
            }
        });
    }

</script>
</body>
</html>
