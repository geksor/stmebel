<?

/* @var $model \common\models\Contact */

?>

<div class="head_soc flex">
    <div class="head_soc_img">
        <a href="<?= $model->insta ?>">
            <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" version="1.1" style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink">
                       <path class="fill_soc" fill-rule="evenodd" d="M23.927 16.947c-.058 1.278-.261 2.15-.558 2.913a6.135 6.135 0 0 1-3.51 3.51c-.763.296-1.635.499-2.912.558-1.28.058-1.689.072-4.948.072-3.258 0-3.667-.014-4.947-.072-1.277-.059-2.149-.262-2.913-.558a5.89 5.89 0 0 1-2.125-1.384A5.89 5.89 0 0 1 .629 19.86c-.296-.763-.499-1.635-.557-2.913C.013 15.668 0 15.259 0 12c0-3.259.013-3.668.072-4.948.058-1.277.26-2.149.557-2.913.301-.8.774-1.526 1.385-2.125A5.876 5.876 0 0 1 4.139.63C4.902.333 5.774.13 7.052.072 8.331.014 8.74 0 11.999 0c3.259 0 3.668.014 4.948.072 1.277.058 2.149.261 2.912.558a5.88 5.88 0 0 1 2.126 1.384 5.872 5.872 0 0 1 1.384 2.125c.297.764.5 1.636.558 2.913.058 1.28.072 1.689.072 4.948 0 3.259-.014 3.667-.072 4.947zm-2.16-9.796c-.053-1.17-.248-1.806-.413-2.228a3.703 3.703 0 0 0-.898-1.38 3.727 3.727 0 0 0-1.379-.898c-.423-.164-1.059-.36-2.229-.413-1.265-.058-1.645-.07-4.849-.07s-3.583.012-4.849.07c-1.17.053-1.805.249-2.228.413a3.731 3.731 0 0 0-1.38.898 3.727 3.727 0 0 0-.898 1.38c-.164.422-.359 1.058-.412 2.228-.059 1.265-.071 1.645-.071 4.849s.012 3.584.071 4.849c.053 1.17.248 1.806.412 2.228.193.522.5.993.898 1.38.388.399.859.705 1.38.898.423.164 1.058.36 2.228.413 1.266.058 1.645.07 4.849.07s3.584-.012 4.849-.07c1.17-.053 1.806-.249 2.229-.413a3.976 3.976 0 0 0 2.277-2.278c.165-.422.36-1.058.413-2.228.058-1.265.07-1.645.07-4.849s-.012-3.584-.07-4.849zm-3.362-.117a1.44 1.44 0 1 1 0-2.88 1.44 1.44 0 0 1 0 2.88zm-6.406 11.128a6.162 6.162 0 1 1 0-12.324 6.162 6.162 0 0 1 0 12.324zm0-10.162a4 4 0 1 0 0 8 4 4 0 0 0 0-8z"/>
                    </svg>
        </a>
    </div>
    <div class="head_soc_img">
        <a href="tg://resolve?domain=<?= $model->telegram ?>">
            <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" version="1.1" style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink">
                       <path class="fill_soc" fill-rule="evenodd" d="M19.319 22a.932.932 0 0 1-.533-.168l-6.034-4.195-3.237 2.387a.932.932 0 0 1-.876.126.965.965 0 0 1-.597-.668L6.417 13.17.61 10.895A.972.972 0 0 1 0 9.992a.973.973 0 0 1 .598-.912L22.677.076a.95.95 0 0 1 .428-.075.936.936 0 0 1 .658.331.981.981 0 0 1 .216.836l-3.727 20.041a.964.964 0 0 1-.569.716.927.927 0 0 1-.364.075zm-6.037-6.348l5.375 3.737 2.899-15.594-10.473 10.329 2.173 1.511.026.017zm-4.475-.831l.72 2.795 1.551-1.143-2.031-1.412a.96.96 0 0 1-.24-.24zM3.563 9.967l3.987 1.562a.968.968 0 0 1 .58.661l.505 1.964a.986.986 0 0 1 .286-.6l9.98-9.842L3.563 9.967z"/>
                    </svg>
        </a>
    </div>
    <div class="head_soc_img">
        <a href="whatsapp://send?text=Здравствуйте мне необходимо консультация по Вашим услугам&amp;phone=<?= $model->whatsApp ?>">
            <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" version="1.1" style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd" viewBox="0 0 25 25" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <path class="fill_soc" fill-rule="evenodd" d="M11.704 22.423c-1.868 0-3.714-.461-5.347-1.334L.389 22.986a.295.295 0 0 1-.303-.076.296.296 0 0 1-.07-.305l1.94-5.723a11.129 11.129 0 0 1-1.549-5.67C.407 5.03 5.475 0 11.704 0 17.932 0 23 5.03 23 11.212c0 6.181-5.068 11.211-11.296 11.211zm-.001-20.088c-4.933 0-8.947 3.982-8.947 8.877 0 1.881.589 3.68 1.703 5.203.058.078.073.18.042.272l-.965 2.848 2.989-.951a.3.3 0 0 1 .255.035 8.954 8.954 0 0 0 4.924 1.468c4.933 0 8.947-3.981 8.947-8.875 0-4.895-4.014-8.877-8.948-8.877zm3.603 14.231l-.083.007c-.129.013-.276.028-.46.028-.437 0-1.206-.075-2.83-.724-1.687-.674-3.35-2.118-4.685-4.068l-.047-.068c-.349-.46-1.161-1.667-1.161-2.947 0-1.421.681-2.229 1.082-2.483.38-.238 1.237-.351 1.395-.358.13-.005.099-.005.13-.005.332 0 .571.201.752.634.075.18.783 1.889.823 1.968.048.095.197.388.022.736l-.037.076c-.072.145-.134.27-.273.432l-.135.161c-.096.115-.195.234-.286.324-.031.032-.091.092-.098.116 0 0 .001.021.028.067.187.316 1.552 2.195 3.351 2.977.079.034.338.141.353.141.017 0 .045-.028.065-.052.157-.177.664-.77.832-1.018.148-.222.338-.335.564-.335.139 0 .27.043.391.087.298.107 1.975.933 2.019.954.22.105.393.189.494.354.147.243.088.914-.132 1.528-.28.779-1.513 1.418-2.074 1.468z"/>
                    </svg>
        </a>
    </div>
</div>

