
const fs                = require('fs');
const tailwindConfig    = require('./tailwind.config');

function getTailwindColours() {
    let sass = `// This file is automatically generated, do not edit \n`;
    for (let key in tailwindConfig.theme.extend.colors) {
        if (tailwindConfig.theme.extend.colors.hasOwnProperty(key)) {
        let property = tailwindConfig.theme.extend.colors[key];

        if (typeof property === 'object' && property !== null) {
            for (let subkey in property) {
            if (property.hasOwnProperty(subkey)) {
                let subvalue = property[subkey];
                sass += `$${key}-${subkey}: ${subvalue}; \n`;
            }
            }
        } else {
            sass += `$${key}: ${property}; \n`;
        }

        }
    }
    return sass;
}
  
async function writeTailwindToSass() {

    let coloursData = getTailwindColours();
    fs.writeFile('assets/styles/_colours.scss', coloursData, function (err, _file) {
        if (err) throw err;
    });
}

module.exports = {
    writeTailwindToSass
};