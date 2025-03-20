function generateProductCode(productNameId, brandId, sizeId, colorId, outputId) {
    // Lấy giá trị từ các trường nhập liệu
    const productName = document.getElementById(productNameId).value;
    const brand = document.getElementById(brandId).value;
    const size = document.getElementById(sizeId).value;
    const color = document.getElementById(colorId).value;

    // Chuyển đổi tên sản phẩm thành không dấu, viết thường và không có khoảng trắng
    const slugify = (text) => {
        return text
            .toString()
            .toLowerCase()
            .replace(/\s+/g, '') // Xóa khoảng trắng
            .replace(/[^\w\-]+/g, '') // Xóa ký tự không phải chữ cái, số hoặc dấu gạch ngang
            .replace(/\-\-+/g, '-') // Thay thế nhiều dấu gạch ngang bằng một dấu gạch ngang
            .replace(/^-+/, '') // Xóa dấu gạch ngang ở đầu
            .replace(/-+$/, ''); // Xóa dấu gạch ngang ở cuối
    };

    // Tạo mã sản phẩm
    const productCode = slugify(productName) + slugify(brand) + slugify(size) + slugify(color);

    // Cập nhật giá trị vào trường mã sản phẩm
    document.getElementById(outputId).value = productCode;
}

// Hàm để thiết lập lắng nghe sự kiện cho các trường
function setupProductCodeGeneration(productNameId, brandId, sizeId, colorId, outputId) {
    document.getElementById(productNameId).addEventListener('input', () => generateProductCode(productNameId, brandId, sizeId, colorId, outputId));
    document.getElementById(brandId).addEventListener('input', () => generateProductCode(productNameId, brandId, sizeId, colorId, outputId));
    document.getElementById(sizeId).addEventListener('input', () => generateProductCode(productNameId, brandId, sizeId, colorId, outputId));
    document.getElementById(colorId).addEventListener('input', () => generateProductCode(productNameId, brandId, sizeId, colorId, outputId));
}


// nhét cái này vào cuối trang để dùng
{/* <script>
    document.addEventListener('DOMContentLoaded', function() {
        setupProductCodeGeneration('product_name', 'brand', 'size', 'color', 'product_code');
    });
</script> */}