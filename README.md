## Sortable Select Field for Bolt 

### Note this is no longer required for Bolt 3.2 and later, the behaviour is built in to Bolt core

This extension allows you to mark select fields as being sortable. The sort order is persisted to the database.

You can only use this on fields that are marked as: `multiple: true`

For the example as used in the screenshots, here's the relevant entry in `contenttypes.yml`.

    subnavpages:
            type: select
            multiple: true
            autocomplete: true
            values: pages/id,title
            sortable: true
            label: Show These Pages as part of the sub-navigation
            
The important addition is the `sortable: true` after adding this your normal select field will become sortable.
