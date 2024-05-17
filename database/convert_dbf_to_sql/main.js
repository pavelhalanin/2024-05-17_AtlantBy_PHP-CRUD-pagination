const fs = require('fs');
const arr = require('./inv_docs.json');

async function main() {
  const filename = 'inv_docs.sql';
  await fs.promises.writeFile(filename, '');

  const a = [];
  for (let i = 0; i < arr.length - 1; i++) {
    const {
      'id,N,11,0': id,
      'id_invoice,N,16,0': id_invoice,
      'type_doc,C,3': type_doc,
      'name_doc,C,50': name_doc,
      'data_doc,D': data_doc_TEMP,
      'blank_cod,C,6': blank_cod,
      'seria,C,2': seria,
      'numdoc,C,128': numdoc,
      'descript_d,C,150': descript_d,
      'n_plat_t,C,10': n_plat_t,
    } = arr[i];

    const [day, month, year] = data_doc_TEMP.split('.');
    const YYYY = year.padStart(4, '0');
    const MM = month.padStart(2, '0');
    const DD = day.padStart(2, '0');
    const data_doc = `${YYYY}-${MM}-${DD}`;

    a.push(
      `('${id}', '${id_invoice}', '${type_doc}', '${name_doc}', '${data_doc}', '${blank_cod}', '${seria}', '${numdoc}', '${descript_d}', '${n_plat_t}')`,
    );
  }

  const SQL =
    'INSERT INTO inv_docs (`id`, `id_invoice`, `type_doc`, `name_doc`, `data_doc`, `blank_cod`, `seria`, `numdoc`, `descript_d`, `n_plat_t`) VALUES\n' +
    a.join(',\n') +
    ';\n';

  await fs.promises.writeFile(filename, SQL);
}

main();
