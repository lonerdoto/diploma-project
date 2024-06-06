document.addEventListener('DOMContentLoaded', function () {
        const exportButton = document.getElementById('export-button');
        const table = document.getElementById('data-table');
    function getFormattedDate() {
        const today = new Date();
        const day = String(today.getDate()).padStart(2, '0');
        const month = String(today.getMonth() + 1).padStart(2, '0'); // Январь начинается с 0
        const year = today.getFullYear();

        return `${day}-${month}-${year}`;
    }
        exportButton.addEventListener('click', async function () {
            const workbook = new ExcelJS.Workbook();
            const worksheet = workbook.addWorksheet('Sheet1');

            const headerRow = worksheet.addRow([...table.querySelectorAll('thead th')].map(th => th.innerText));
            headerRow.height = 30;

            headerRow.eachCell((cell) => {
                cell.font = { bold: true };
                cell.alignment = { vertical: 'middle', horizontal: 'center', wrapText: true };
                cell.fill = {
                    type: 'pattern',
                    pattern: 'solid',
                    fgColor: { argb: 'FF4F81BD' }
                };
                cell.font = { color: { argb: 'FFFFFFFF' }, bold: true };
                cell.border = {
                    top: { style: 'thin' },
                    left: { style: 'thin' },
                    bottom: { style: 'thin' },
                    right: { style: 'thin' }
                };
            });

            const rows = [...table.querySelectorAll('tbody tr')].map(tr =>
                [...tr.querySelectorAll('td')].map(td => td.innerText)
            );

            rows.forEach((row) => {
                worksheet.addRow(row).eachCell((cell) => {
                    cell.border = {
                        top: { style: 'thin' },
                        left: { style: 'thin' },
                        bottom: { style: 'thin' },
                        right: { style: 'thin' }
                    };
                });
            });

            worksheet.columns.forEach(column => {
                const lengths = column.values.map(value => value.toString().length);
                const maxLength = Math.max(...lengths.filter(val => val !== undefined));
                column.width = maxLength + 2;
            });

            const buffer = await workbook.xlsx.writeBuffer();
            const blob = new Blob([buffer], { type: 'application/octet-stream' });
            const link = document.createElement('a');
            link.href = URL.createObjectURL(blob);

            link.download = "Записи диспетчера " + getFormattedDate() + '.xlsx';
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        });
    });

