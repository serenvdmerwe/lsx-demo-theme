const fs = require('fs');
const path = require('path');
const yaml = require('js-yaml');

// Path to the workflows directory
const workflowsDir = path.join(__dirname, '..', 'workflows');

describe('GitHub Workflow Validation', () => {
    const workflowFiles = fs.readdirSync(workflowsDir)
        .filter(file => file.endsWith('.yml') || file.endsWith('.yaml'));

    test.each(workflowFiles)('%s is valid YAML', (file) => {
        const filePath = path.join(workflowsDir, file);
        const fileContent = fs.readFileSync(filePath, 'utf8');

        // This will throw an error if the YAML is invalid
        expect(() => {
            yaml.load(fileContent);
        }).not.toThrow();
    });

    test.each(workflowFiles)('%s has a name property', (file) => {
        const filePath = path.join(workflowsDir, file);
        const fileContent = fs.readFileSync(filePath, 'utf8');
        const parsedWorkflow = yaml.load(fileContent);

        expect(parsedWorkflow).toHaveProperty('name');
    });

    test.each(workflowFiles)('%s has an "on" trigger', (file) => {
        const filePath = path.join(workflowsDir, file);
        const fileContent = fs.readFileSync(filePath, 'utf8');
        const parsedWorkflow = yaml.load(fileContent);

        expect(parsedWorkflow).toHaveProperty('on');
    });

    test.each(workflowFiles)('%s has at least one job', (file) => {
        const filePath = path.join(workflowsDir, file);
        const fileContent = fs.readFileSync(filePath, 'utf8');
        const parsedWorkflow = yaml.load(fileContent);

        expect(parsedWorkflow).toHaveProperty('jobs');
        expect(Object.keys(parsedWorkflow.jobs).length).toBeGreaterThan(0);
    });
});
